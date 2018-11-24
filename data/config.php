<?PHP 
define ("DBHOST", "localhost");

define ("DBNAME", "realengine");

define ("DBUSER", "root");

define ("DBPASS", "9379992");

define ("PREFIX", "re");

define ("COLLATE", "utf8mb4");

define('SECURE_AUTH_KEY', ')2K9a|I=oYHIr1:/90h@dF|U0Z,2(MZ|hX;-6hsElp~3m7M%a6T>^iyBao)ONv#');

$config = array (

'home_title' => 'RealEngine',

'http_url' => 'http://127.0.0.1/',

'description' => 'Демонстрационная страница движка RealEngine',

'keywords' => 'RealEngine, Engine, CMS, PHP движок',

'title' => 'Демонстрационный сайт',

'date_adjust' => 'Europe/Moscow',

'seo_type' => '2',

'skin' => 'Default',

'allow_admin_wysiwyg' => '1',

'allow_static_wysiwyg' => '1',

'offline_reason' => 'Сайт находится на текущей реконструкции, после завершения всех работ сайт будет открыт.<br><br>Приносим вам свои извинения за доставленные неудобства.',

'admin_path' => 'admin.php',

'extra_login' => '0',

'own_ip' => '',

'admin_allowed_ip' => '',

'login_log' => '5',

'login_ban_timeout' => '20',

'ip_control' => '1',

'allow_recaptcha' => '0',

'recaptcha_public_key' => '',

'recaptcha_private_key' => '',

'recaptcha_theme' => 'light',

'adminlog_maxdays' => '30',

'news_number' => '10',

'search_number' => '10',

'search_pages' => '5',

'related_number' => '5',

'top_number' => '10',

'tags_number' => '40',

'max_moderation' => '0',

'news_restricted' => '0',

'category_separator' => '/',

'speedbar_separator' => '&raquo;',

'timestamp_active' => 'j-m-Y, H:i',

'news_navigation' => '1',

'news_sort' => 'date',

'news_msort' => 'DESC',

'catalog_sort' => 'date',

'catalog_msort' => 'DESC',

'create_metatags' => '1',

'mail_news' => '1',

'show_sub_cats' => '1',

'allow_search_print' => '1',

'allow_add_tags' => '1',

'allow_share' => '1',

'short_rating' => '1',

'rating_type' => '0',

'allow_site_wysiwyg' => '1',

'allow_quick_wysiwyg' => '1',

'allow_comments' => '1',

'tree_comments_level' => '5',

'comments_restricted' => '0',

'allow_subscribe' => '1',

'allow_combine' => '1',

'max_comments_days' => '0',

'comments_minlen' => '10',

'comments_maxlen' => '3000',

'comm_nummers' => '30',

'comm_msort' => 'ASC',

'flood_time' => '30',

'auto_wrap' => '80',

'timestamp_comment' => 'j F Y H:i',

'allow_search_link' => '1',

'mail_comments' => '1',

'allow_comments_rating' => '1',

'comments_rating_type' => '1',

'allow_comments_wysiwyg' => '1',

'clear_cache' => '0',

'max_cache_pages' => '10',

'fullcache_days' => '30',

'cache_type' => '0',

'memcache_server' => 'localhost:11211',

'allow_comments_cache' => '1',

'full_search' => '0',

'fast_search' => '1',

'allow_registration' => '1',

'allow_multi_category' => '1',

'related_news' => '1',

'no_date' => '1',

'allow_fixed' => '1',

'speedbar' => '1',

'allow_banner' => '1',

'allow_votes' => '1',

'allow_topnews' => '1',

'allow_read_count' => '1',

'category_newscount' => '1',

'allow_calendar' => '1',

'allow_archives' => '1',

'rss_informer' => '1',

'allow_tags' => '1',

'allow_change_sort' => '1',

'online_status' => '1',

'allow_links' => '1',

'allow_redirects' => '1',

'allow_own_meta' => '1',

'allow_plugins' => '1',

'files_allow' => '1',

'max_file_count' => '0',

'files_force' => '1',

'files_antileech' => '1',

'files_count' => '1',

'admin_mail' => 'tureduard@gmail.com',

'mail_title' => '',

'mail_metod' => 'php',

'smtp_host' => 'localhost',

'smtp_port' => '25',

'smtp_user' => '',

'smtp_pass' => '',

'smtp_secure' => '',

'smtp_mail' => '',

'auth_metod' => '0',

'twofactor_auth' => '1',

'reg_group' => '4',

'registration_type' => '0',

'sec_addnews' => '2',

'spam_api_key' => '',

'profile_news' => '1',

'reg_multi_ip' => '1',

'auth_domain' => '0',

'registration_rules' => '1',

'allow_sec_code' => '1',

'allow_skin_change' => '1',

'mail_pm' => '1',

'max_users' => '0',

'max_users_day' => '0',

'max_up_side' => '0',

'o_seite' => '0',

'max_up_size' => '200',

'max_image_days' => '2',

'allow_watermark' => '1',

'max_watermark' => '150',

'watermark_seite' => '4',

'max_image' => '200',

'medium_image' => '450',

't_seite' => '0',

'jpeg_quality' => '85',

'avatar_size' => '100',

'tag_img_width' => '0',

'image_align' => 'center',

'thumb_gallery' => '1',

'outlinetype' => '0',

'allow_smart_format' => '1',

'mobile_news' => '10',

'allow_rss' => '1',

'rss_mtype' => '0',

'rss_number' => '10',

'rss_format' => '1',

'charset' => 'utf-8',

'seo_control' => '0',

'allow_complaint_mail' => '0',

'site_offline' => '0',

'log_hash' => '0',

'news_future' => '0',

'create_catalog' => '0',

'parse_links' => '0',

'related_only_cats' => '0',

'hide_full_link' => '0',

'js_min' => '0',

'allow_cmod' => '0',

'cache_count' => '0',

'comments_ajax' => '0',

'allow_cache' => '0',

'allow_gzip' => '0',

'use_admin_mail' => '0',

'mail_bcc' => '0',

'reg_question' => '0',

'thumb_dimming' => '0',

'allow_smartphone' => '0',

'allow_smart_images' => '0',

'allow_smart_video' => '0',

'comments_lazyload' => '0',

'allow_social' => '0',

'auth_only_social' => '0',

'tree_comments' => '0',

'simple_reply' => '0',

'only_ssl' => '0',

'bbimages_in_wysiwyg' => '0',

'own_404' => '0',

'disable_frame' => '0',

'allow_admin_social' => '0',

'version' => '1.10',


);

?>