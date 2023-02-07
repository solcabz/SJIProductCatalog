<?php
$tineyeapi = new tineye\api\TinEyeApi(
    '6mm60lsCNIB,FwOWjJqA80QZHh9BMwc-ber4u=t^',
);

$search_result = $tineyeapi->searchData(
    fopen('603097122786194335afee80_4_render_-p-130x130q80.jpeg', 'r'),
    '603097122786194335afee80_4_render_-p-130x130q80.jpeg'
);
$search_bundles = $tineyeapi->imageCount();


$search_bundles = $tineyeapi->remainingSearches();
?>