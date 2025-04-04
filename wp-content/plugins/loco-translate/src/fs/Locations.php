<?php
/**
 * Handles various file locations
 */
class Loco_fs_Locations extends ArrayObject {

    /**
     * Singleton of WordPress root directory
     * @var Loco_fs_Locations
     */    
    private static $roots;

    /**
     * Singleton of wp-content directory
     * @var Loco_fs_Locations
     */    
    private static $conts;

    /**
     * Singleton of global languages directories
     * @var Loco_fs_Locations
     */    
    private static $langs;


    /**
     * Singleton of registered theme paths
     * @var Loco_fs_Locations
     */    
    private static $theme;


    /**
     * Singleton of registered plugin locations
     * @var Loco_fs_Locations
     */    
    private static $plugin;


    /**
     * Clear static caches
     */
    public static function clear(){
        self::$roots = null;
        self::$conts = null;
        self::$langs = null;
        self::$theme = null;
        self::$plugin = null;
    }


    /**
     * @return Loco_fs_Locations 
     */
    public static function getRoot(){
        if( ! self::$roots ){
            self::$roots = new Loco_fs_Locations( [
                loco_constant('ABSPATH'),
            ] );
        }
        return self::$roots;
    }


    /**
     * @return Loco_fs_Locations 
     */
    public static function getContent(){
        if( ! self::$conts ){
            self::$conts = new Loco_fs_Locations( [
                loco_constant('WP_CONTENT_DIR'),  // <- defined WP_CONTENT_DIR
                trailingslashit(ABSPATH).'wp-content', // <- default /wp-content
            ] );
        }
        return self::$conts;
    }


    /**
     * @deprecated Use getLang
     * @return Loco_fs_Locations
     */
    public static function getGlobal(){
        return self::getLangs();
    }


    /**
     * @return Loco_fs_Locations
     */
    public static function getLangs(){
        if( ! self::$langs ){
            self::$langs = new Loco_fs_Locations( [
                loco_constant('WP_LANG_DIR'),
            ] );
        }
        return self::$langs;
    }


    /**
     * @return Loco_fs_Locations 
     */
    public static function getThemes(){
        if( ! self::$theme ){
            $roots = isset($GLOBALS['wp_theme_directories']) ? $GLOBALS['wp_theme_directories'] : [];
            if( ! $roots ){
                $roots[] = trailingslashit( loco_constant('WP_CONTENT_DIR') ).'themes';
            }
            self::$theme = new Loco_fs_Locations( $roots );
        }
        return self::$theme;
    }


    /**
     * @return Loco_fs_Locations 
     */
    public static function getPlugins(){
        if( ! self::$plugin ){
            self::$plugin = new Loco_fs_Locations( [
                loco_constant('WPMU_PLUGIN_DIR'),
                loco_constant('WP_PLUGIN_DIR'),
            ] );
        }
        return self::$plugin;
    }


    /**
     * Create instance from list of locations
     */
    public function __construct( array $paths ){
        parent::__construct( [] );
        foreach( $paths as $path ){
            $this->add( $path );
        }
    }


    /**
     * @param string $path normalized absolute path
     * @return Loco_fs_Locations
     */ 
    public function add( $path ){
        foreach( $this->expand($path) as $path ){
            // path must have trailing slash, otherwise "/plugins/foobar" would match "/plugins/foo/"
            $this->offsetSet( $path, strlen($path) );
        }
        return $this;
    }


    /**
     * Check if a given path begins with any of the registered ones
     * @param string $path absolute path
     * @return bool whether path matched
     */    
    public function check( $path ){
        foreach( $this->expand($path) as $path ){
            foreach( $this as $prefix => $length ){
                if( $prefix === $path || substr($path,0,$length) === $prefix ){
                    return true;
                }
            }
        }
        return false;
    }
    
    
    /**
     * Match location and return the relative subpath.
     * Note that exact match is returned as "." indicating self
     * @param string $path
     * @return string | null
     */
    public function rel( $path ){
        foreach( $this->expand($path) as $path ){
            foreach( $this as $prefix => $length ){
                if( $prefix === $path ){
                    return '.';
                }
                if( substr($path,0,$length) === $prefix ){
                    return untrailingslashit( substr($path,$length) );
                }
            }
        }
        return null;
    }


    /**
     * Like rel() but returns base directory also
     * @return string[]
     */
    public function split( $path ){
        foreach( $this->expand($path) as $path ){
            foreach( $this as $prefix => $length ){
                if( $prefix === $path ){
                    return [$prefix,'.'];
                }
                if( substr($path,0,$length) === $prefix ){
                    return [ $prefix, untrailingslashit( substr($path,$length) ) ];
                }
            }
        }
        return null;
    }


    /*
     * Opposite of rel, takes a relative path and constructs the first full path that exists
     *
    public function abs( $rel ){
        foreach( $this as $prefix => $length ){
            $path = realpath( $prefix.$rel );
            if( $path ){
                return $path;
            }
        }
        return null;
    }*/


    /**
     * @param string $rel
     * @return string[]
     */
    public function expand( $rel ){
        if( '' === $rel ){
            //Loco_error_AdminNotices::debug('Expanding empty path to empty array');
            return [];
        }
        $path = Loco_fs_File::abs($rel);
        if( '' === $path ){
            //throw new InvalidArgumentException('Failed on abs('.var_export($rel,true).')');
            return [];
        }
        $paths = [ trailingslashit($path) ];
        // add real path if differs
        $real = realpath($path);
        if( $real && $real !== $path ){
            $paths[] = trailingslashit($real);
        }
        return $paths;
    }


    /**
     * @return string[]
     */
    public function apply( $suffix = '' ){
        $paths = [];
        foreach( $this->getArrayCopy() as $prefix => $length ){
            $paths[] = $prefix.$suffix;
        }
        return $paths;
    }

    

}
