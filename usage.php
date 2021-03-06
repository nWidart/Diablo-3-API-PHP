<?php
// For timing
$time  = microtime();
$time  = explode(' ', $time);
$time  = $time[1] + $time[0];
$start = $time;
// For timing

require_once('diablo3.api.class.php');

// Settings
set_time_limit(0);
ini_set('memory_limit', '128M');

$Diablo3            = new Diablo3("XjSv#1677", 'us', 'en_US');                                            // Battle Tag (e.g. 'XjSv#1677' or 'XjSv-1677') (string), Server: 'us', 'eu', etc. (string), Locale: 'en_US', 'es_MX', etc. (string)
$CAREER_DATA        = $Diablo3->getCareer();
$HERO_DATA          = $Diablo3->getHero(3982160);                                                         // Hero ID (int)
$ITEM_DATA          = $Diablo3->getItem('item/COGHsoAIEgcIBBXIGEoRHYQRdRUdnWyzFB2qXu51MA04kwNAAFAKYJMD'); // Item Data 'item/COGHsoAIEgcIBBXIGEoRHYQRdRUdnWyzFB2qXu51MA04kwNAAFAKYJMD'  (string)
$FOLLOWER_DATA      = $Diablo3->getFollower('templar');                                                   // Options: 'enchantress', 'templar', 'scoundrel' (string)
$ARTISAN_DATA       = $Diablo3->getArtisan('blacksmith');                                                 // Options: 'blacksmith', 'jeweler' (string)
$ITEM_IMAGE         = $Diablo3->getItemImage('unique_chest_013_104_demonhunter_male', 'large');           // Icon Name, Size: Options: 'small', 'large' (string)
$SKILL_IMAGE        = $Diablo3->getSkillImage('barbarian_frenzy', '64');                                  // Icon Name, Size: Options: '21', '42', '64' (string)
$SKILL_TOOLTIP      = $Diablo3->getSkillToolTip('skill/barbarian/frenzy', true);                          // tooltipUrl, true for jsonp
$SKILL_RUNE_TOOLTIP = $Diablo3->getSkillToolTip('rune/frenzy/a', false);                                  // tooltipUrl, true for jsonp
$PAPERDOLL          = $Diablo3->getPaperDoll('barbarian', 'female');                                      // Class, Gender

// Before handling the data check to make sure the return is an array
//
if(is_array($CAREER_DATA)) {
    print_r($CAREER_DATA);
} else {
    echo $CAREER_DATA; // Error message
}

/*if(is_array($HERO_DATA)) {
    print_r($HERO_DATA);
} else {
    echo $HERO_DATA; // Error message
}

if(is_array($ITEM_DATA)) {
    print_r($ITEM_DATA);
} else {
    echo $ITEM_DATA; // Error message
}

if(is_array($FOLLOWER_DATA)) {
    print_r($FOLLOWER_DATA);
} else {
    echo $FOLLOWER_DATA; // Error message
}

if(is_array($ARTISAN_DATA)) {
    print_r($ARTISAN_DATA);
} else {
    echo $ARTISAN_DATA; // Error message
}*/

// Item & skill image
//
echo '<img src="'.$PAPERDOLL.'">';
echo '<img src="'.$ITEM_IMAGE.'">';
echo '<img src="'.$SKILL_IMAGE.'">';

// Skill tooltip and rune tooltip (for javascript handling)
//
echo $SKILL_TOOLTIP;
echo $SKILL_RUNE_TOOLTIP;

// For timing
$time       = microtime();
$time       = explode(' ', $time);
$time       = $time[1] + $time[0];
$finish     = $time;
$total_time = round(($finish - $start), 4);
echo '<br>Proccess finished in '.$total_time.' seconds.'."<br>";
// For timing
