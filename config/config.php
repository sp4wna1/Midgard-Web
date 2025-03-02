<?PHP

$towns_list = array(1 => 'Thais', 2 => 'Carlin', 3 => 'Kazordoon', 4 => "Ab'Dendriel", 5 => 'Edron', 6 => 'Darashia', 7 => 'Venore', 8 => 'Ankrahmun', 9 => 'Port Hope', 10 => 'Home', 11 => 'Rookgard');

# Account Maker Config
$config['site']['serverPath'] = $_SERVER['DOCUMENT_ROOT'] . "/Midgard-Xml/";

$config['site']['outfit_images_url'] = 'http://outfit-images.ots.me/outfit.php';
$config['site']['item_images_url'] = 'http://item-images.ots.me/960/';
$config['site']['item_images_extension'] = '.gif';
$config['site']['flag_images_url'] = 'http://flag-images.ots.me/';
$config['site']['flag_images_extension'] = '.png';

# Create Account Options
$config['site']['one_email'] = true;
$config['site']['create_account_verify_mail'] = false;
$config['site']['verify_code'] = false;
$config['site']['email_days_to_change'] = 3;
$config['site']['newaccount_premdays'] = 0;
$config['site']['select_flag'] = true;

# Create Character Options
$config['site']['newchar_vocations'] = array(0 => 'Rook Sample');
$config['site']['newchar_towns'] = array(11);
$config['site']['max_players_per_account'] = 4;

# Emails Config
$config['site']['send_emails'] = true;
$config['site']['recovery_account'] = true;
$config['site']['mail_address'] = "account@midgard.com.br";
$config['site']['smtp_enabled'] = true;

# PAGE: whoisonline.php
$config['site']['private-servlist.com_server_id'] = 0;
/*
Server id on 'private-servlist.com' to show Players Online Chart (whoisonline.php page), set 0 to disable Chart feature.
To use this feature you must register on 'private-servlist.com' and add your server.
Format: number, 0 [disable] or higher
*/

# PAGE: characters.php
$config['site']['quests'] = array();
$config['site']['show_skills_info'] = true;
$config['site']['show_vip_storage'] = 0;

# PAGE: accountmanagement.php
$config['site']['send_mail_when_change_password'] = true;
$config['site']['send_mail_when_generate_reckey'] = true;
$config['site']['generate_new_reckey'] = false;
$config['site']['generate_new_reckey_price'] = 500;

# PAGE: guilds.php
$config['site']['guild_need_level'] = 15;
$config['site']['guild_need_pacc'] = true;
$config['site']['guild_image_size_kb'] = 50;
$config['site']['guild_description_chars_limit'] = 2000;
$config['site']['guild_description_lines_limit'] = 6;
$config['site']['guild_motd_chars_limit'] = 250;

# PAGE: adminpanel.php
$config['site']['access_admin_panel'] = 3;

# PAGE: latestnews.php
$config['site']['news_limit'] = 6;

# PAGE: killstatistics.php
$config['site']['last_deaths_limit'] = 40;

# PAGE: team.php
$config['site']['groups_support'] = array(2, 3, 4, 5);

# PAGE: highscores.php
$config['site']['groups_hidden'] = array(4, 5, 6);
$config['site']['accounts_hidden'] = array(974294);

# PAGE: shopsystem.php
$config['site']['shop_system'] = true;

# Layout Config
$config['site']['layout'] = 'tibiacom';
$config['site']['vdarkborder'] = '#505050';
$config['site']['darkborder'] = '#D4C0A1';
$config['site']['lightborder'] = '#F1E0C6';
$config['site']['serverinfo_page'] = true;

# PAGE: downloads.php
$config['site']['download_page'] = true;
$config['site']['client'] = "https://midgard-files.s3-sa-east-1.amazonaws.com/Midgard-Client.rar";
