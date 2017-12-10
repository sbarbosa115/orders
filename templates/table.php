<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Jarocho Landscaping, Inc.</title>
</head>
<body>

<table cellspacing="0" cellpadding="1" border="0">
    <tr>
        <td colspan="2" rowspan="5" style="text-align: center"><img src="<?php echo ORDERS_PLUGIN_DIR . "assets/images/logo.png" ?>" width="150px"></td>
        <td colspan="2" style="text-align: center">173785 Sun Flower Ct. Apt</td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center">West Palm Beach. FL 33414 <span style="color: red; font-weight: bold; font-size: 15px">  00<?php echo $next ?></span></td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center">561-379-4790</td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center">Lic. & Ins.</td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center">info@jarocholandscaping.com</td>
    </tr>
</table>

<table cellspacing="0" cellpadding="1" border="0" style="font-size: 8px">
    <tr>
        <td colspan="2" rowspan="9">
            <span style="font-weight: bold; font-size: 16px"><?php if(is_isset_and_not_empty($_POST['order']['type'])) echo strtoupper($_POST['order']['type']) ?></span>
        </td>
        <td border="1" colspan="2">CUSTOMER NAME: <span><?php if(is_isset_and_not_empty($_POST['order']['customer_name'])) echo $_POST['order']['customer_name'] ?></span></td>
    </tr>
    <tr>
        <td border="1">DATE OF ORDER: <span><?php if(is_isset_and_not_empty($_POST['order']['date_of_order'])) echo $_POST['order']['date_of_order'] ?></span></td>
        <td border="1">HOME PHONE No: <span><?php if(is_isset_and_not_empty($_POST['order']['home_phone'])) echo $_POST['order']['home_phone'] ?></span></td>
    </tr>
    <tr>
        <td border="1">BILL TO: <span><?php if(is_isset_and_not_empty($_POST['order']['taken_by'])) echo $_POST['order']['taken_by'] ?></span></td>
        <td border="1">WORK PHONE No: <span><?php if(is_isset_and_not_empty($_POST['order']['work_phone'])) echo $_POST['order']['work_phone'] ?></span></td>
    </tr>
    <tr>
        <td border="1">CUSTOMER ORDER No: <span style="font-weight: bold">00<?php echo $next ?></span></td>
        <td border="1" rowspan="2">
            <?php if(is_isset_and_not_empty($_POST['order']['kind']['one_time_job'])) echo "<span>[*] Seasonal Contract</span> " ?>
            <?php if(is_isset_and_not_empty($_POST['order']['kind']['repeat'])) echo "<span>[*] Repeat</span> " ?>
            <?php if(is_isset_and_not_empty($_POST['order']['kind']['one_time_job'])) echo "<span>[*] Seasonal Contract</span> " ?>
        </td>
    </tr>
    <tr>
        <td border="1">APPOINTMENT START DATE: <span><?php if(is_isset_and_not_empty($_POST['order']['appointment_start'])) echo $_POST['order']['appointment_start'] ?></span></td>
    </tr>
    <tr>
        <td border="1">SHIP TO: <span><?php if(is_isset_and_not_empty($_POST['order']['job_name'])) echo $_POST['order']['job_name'] ?></span></td>
        <td border="1"></td>
    </tr>
    <tr>
        <td border="1">JOB LOCATION: <span><?php if(is_isset_and_not_empty($_POST['order']['job_location'])) echo $_POST['order']['job_location'] ?></span></td>
        <td border="1"></td>
    </tr>
    <tr>
        <td border="1">INVOICE DATE: <span><?php if(is_isset_and_not_empty($_POST['order']['invoice_date'])) echo $_POST['order']['invoice_date'] ?></span></td>
        <td border="1">A. COMPLETION DATE: <span><?php if(is_isset_and_not_empty($_POST['order']['appointment_end'])) echo $_POST['order']['appointment_end'] ?></span></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>

<table cellspacing="0" cellpadding="1" border="0" style="top:5px; margin-top: 10px; padding-top: 10px">
    <tr style="color: white; background-color: #000">
        <th border="1">LAWN MAINTENANCE</th>
        <th border="1">CHARGE</th>
        <th border="1">SPRING CLEAN-UP</th>
        <th border="1">CHARGE</th>
    </tr>

    <tr>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['maintenance']['weekly'])) echo "[*]" ?>Weekly </td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['maintenance']['weekly'])) echo $_POST['maintenance']['weekly'] ?></td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['spring_clean']['power_ranking'])) echo "[*]" ?>Power Ranking </td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['spring_clean']['power_ranking'])) echo $_POST['spring_clean']['power_ranking'] ?></td>
    </tr>

    <tr>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['maintenance']['bi_weekly'])) echo "[*]" ?>Bi-Weekly </td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['maintenance']['bi_weekly'])) echo $_POST['maintenance']['bi_weekly'] ?></td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['spring_clean']['moving_trimming'])) echo "[*]" ?>Mowing Trimming Maintained Area </td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['spring_clean']['moving_trimming'])) echo $_POST['spring_clean']['moving_trimming'] ?></td>
    </tr>

    <tr>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['maintenance']['monthly'])) echo "[*]" ?>Monthly</td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['maintenance']['monthly'])) echo $_POST['maintenance']['monthly'] ?></td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['spring_clean']['clean_up'])) echo "[*]" ?>Clean Up Turf/Bed Areas </td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['spring_clean']['clean_up'])) echo $_POST['spring_clean']['clean_up'] ?></td>
    </tr>

    <tr>
        <td></td>
        <td></td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['spring_clean']['cutting_back'])) echo "[*]" ?>Cutting back of Perennials </td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['spring_clean']['cutting_back'])) echo $_POST['spring_clean']['clean_up'] ?></td>
    </tr>

    <tr>
        <td border="1" colspan="2" rowspan="3">Start to: <?php if(is_isset_and_not_empty($_POST['maintenance']['start_date'])) echo $_POST['maintenance']['start_date'] ?>
            End to: <?php if(is_isset_and_not_empty($_POST['maintenance']['end_date'])) echo $_POST['maintenance']['end_date'] ?>
        </td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['spring_clean']['pruning'])) echo "[*]" ?>Pruning (Trim & Shape) </td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['spring_clean']['pruning'])) echo $_POST['spring_clean']['pruning'] ?></td>
    </tr>

    <tr>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['spring_clean']['aeration'])) echo "[*]" ?>Aeration </td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['spring_clean']['aeration'])) echo $_POST['spring_clean']['aeration'] ?></td>
    </tr>

    <tr>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['spring_clean']['off_site_disposal'])) echo "[*]" ?>Off Site Disposal of debris </td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['spring_clean']['off_site_disposal'])) echo $_POST['spring_clean']['off_site_disposal'] ?></td>
    </tr>
</table>

<table cellspacing="0" cellpadding="1" border="0" style="top:5px; margin-top: 10px; padding-top: 10px">

    <tr style="color: white; background-color: #000">
        <th border="1" colspan="3">FERTILIZATION / WEED CONTROL PROGRAM</th>
        <th border="1" colspan="3">FALL CLEAN-UP</th>
    </tr>

    <tr style="color: white; background-color: #000">
        <th border="1" width="26%">DESCRIPTION</th>
        <th border="1" width="10%">MATERIAL</th>
        <th border="1" width="6%">LABOR</th>
        <th border="1" width="8%">AMOUNT</th>

        <th border="1" width="25%"></th>
        <th border="1" width="25%"></th>
    </tr>

    <tr>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['fertilization'][0]['description'])) echo $_POST['fertilization'][0]['description']?></td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['fertilization'][0]['material'])) echo $_POST['fertilization'][0]['material']?></td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['fertilization'][0]['labor'])) echo $_POST['fertilization'][0]['labor'] ?></td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['fertilization'][0]['amount'])) echo $_POST['fertilization'][0]['amount']?></td>

        <td border="1"><?php if(is_isset_and_not_empty($_POST['fall_clean']['clean_up'])) echo "[*]" ?>Clean Up Turf/Bed Areas </td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['fall_clean']['clean_up'])) echo $_POST['fall_clean']['clean_up']?></td>
    </tr>

    <tr>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['fertilization'][1]['description'])) echo $_POST['fertilization'][1]['description']?></td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['fertilization'][1]['material'])) echo $_POST['fertilization'][1]['material']?></td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['fertilization'][1]['labor'])) echo $_POST['fertilization'][1]['labor'] ?></td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['fertilization'][1]['amount'])) echo $_POST['fertilization'][1]['amount']?></td>

        <td border="1"><?php if(is_isset_and_not_empty($_POST['fall_clean']['cutting_back'])) echo "[*]" ?>Cutting back Perennials </td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['fall_clean']['cutting_back'])) echo $_POST['fall_clean']['cutting_back']?></td>
    </tr>

    <tr>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['fertilization'][2]['description'])) echo $_POST['fertilization'][2]['description']?></td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['fertilization'][2]['material'])) echo $_POST['fertilization'][2]['material']?></td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['fertilization'][2]['labor'])) echo $_POST['fertilization'][2]['labor'] ?></td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['fertilization'][2]['amount'])) echo $_POST['fertilization'][2]['amount']?></td>

        <td border="1"><?php if(is_isset_and_not_empty($_POST['fall_clean']['pruning'])) echo "[*]" ?>Pruning (Trim & Shape) </td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['fall_clean']['pruning'])) echo $_POST['fall_clean']['pruning']?></td>
    </tr>

    <tr>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['fertilization'][3]['description'])) echo $_POST['fertilization'][3]['description']?></td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['fertilization'][3]['material'])) echo $_POST['fertilization'][3]['material']?></td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['fertilization'][3]['labor'])) echo $_POST['fertilization'][3]['labor'] ?></td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['fertilization'][3]['amount'])) echo $_POST['fertilization'][3]['amount']?></td>

        <td border="1"><?php if(is_isset_and_not_empty($_POST['fall_clean']['aeration'])) echo "[*]" ?>Aeration </td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['fall_clean']['aeration'])) echo $_POST['fall_clean']['aeration']?></td>
    </tr>

    <tr>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['fertilization'][4]['description'])) echo $_POST['fertilization'][4]['description']?></td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['fertilization'][4]['material'])) echo $_POST['fertilization'][4]['material']?></td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['fertilization'][4]['labor'])) echo $_POST['fertilization'][4]['labor'] ?></td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['fertilization'][4]['amount'])) echo $_POST['fertilization'][4]['amount']?></td>

        <td border="1"><?php if(is_isset_and_not_empty($_POST['fall_clean']['winter_protection'])) echo "[*]" ?>Winter Protection </td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['fall_clean']['winter_protection'])) echo $_POST['fall_clean']['winter_protection']?></td>
    </tr>

    <tr>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['fertilization'][5]['description'])) echo $_POST['fertilization'][5]['description']?></td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['fertilization'][5]['material'])) echo $_POST['fertilization'][5]['material']?></td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['fertilization'][5]['labor'])) echo $_POST['fertilization'][5]['labor'] ?></td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['fertilization'][5]['amount'])) echo $_POST['fertilization'][5]['amount']?></td>

        <td border="1"><?php if(is_isset_and_not_empty($_POST['fall_clean']['transplanting'])) echo "[*]" ?>Transplanting </td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['fall_clean']['transplanting'])) echo $_POST['fall_clean']['transplanting']?></td>
    </tr>

    <tr>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['fertilization'][6]['description'])) echo $_POST['fertilization'][6]['description']?></td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['fertilization'][6]['material'])) echo $_POST['fertilization'][6]['material']?></td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['fertilization'][6]['labor'])) echo $_POST['fertilization'][6]['labor'] ?></td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['fertilization'][6]['amount'])) echo $_POST['fertilization'][6]['amount']?></td>

        <td border="1"><?php if(is_isset_and_not_empty($_POST['fall_clean']['off_site'])) echo "[*]" ?>Off-Site Disposal of debris </td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['fall_clean']['off_site'])) echo $_POST['fall_clean']['off_site']?></td>
    </tr>

    <tr>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['fertilization'][7]['description'])) echo $_POST['fertilization'][7]['description']?></td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['fertilization'][7]['material'])) echo $_POST['fertilization'][7]['material']?></td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['fertilization'][7]['labor'])) echo $_POST['fertilization'][7]['labor'] ?></td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['fertilization'][7]['amount'])) echo $_POST['fertilization'][7]['amount']?></td>

        <td border="1" colspan="2" rowspan="3">Start to: <?php if(is_isset_and_not_empty($_POST['fall_clean']['start_date'])) echo $_POST['fall_clean']['start_date'] ?>
            End to: <?php if(is_isset_and_not_empty($_POST['fall_clean']['end_date'])) echo $_POST['fall_clean']['end_date'] ?>
        </td>
    </tr>


</table>

<table cellspacing="0" cellpadding="1" border="0" style="top:5px; margin-top: 10px; padding-top: 10px">
    <tr style="color: white; background-color: #000">
        <th border="1">BED CARE</th>
        <th border="1">CHARGE</th>
        <th border="1">GUTTER CLEANING</th>
        <th border="1">CHARGE</th>
    </tr>

    <tr>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['bed_care']['applications'])) echo "[*]" ?>Weed Control Maintenance Beds </td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['bed_care']['applications'])) echo $_POST['bed_care']['applications']?></td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['gutter_cleaning']['spring'])) echo "[*]" ?>Spring</td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['gutter_cleaning']['spring'])) echo $_POST['gutter_cleaning']['spring']?></td>
    </tr>

    <tr>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['bed_care']['fertilization'])) echo "[*]" ?>Fertilization of Maintenance Beds </td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['bed_care']['fertilization'])) echo $_POST['fertilization']['turf']['fertilization'] ?></td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['gutter_cleaning']['fall'])) echo "[*]" ?>Fall </td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['gutter_cleaning']['fall'])) echo $_POST['gutter_cleaning']['fall']?></td>
    </tr>

    <tr>
        <td></td>
        <td></td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['gutter_cleaning']['other'])) echo "[*]" ?>Other </td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['gutter_cleaning']['other'])) echo $_POST['gutter_cleaning']['other']?></td>
    </tr>

</table>


<table cellspacing="0" cellpadding="1" border="0" style="top:5px; margin-top: 10px; padding-top: 10px">
    <tr style="color: white; background-color: #000">
        <td border="1"></td>
        <td border="1"></td>
        <td border="1"></td>
        <td colspan="3" style="text-align: center">OTHER PROJECTS</td>
    </tr>
    <tr style="color: white; background-color: #000">
        <th border="1" width="25%">REMOVAL/INSTALLATION</th>
        <th border="1" width="25%">CHARGE</th>
        <th border="1" width="26%">DESCRIPTION</th>
        <th border="1" width="10%">MATERIAL</th>
        <th border="1" width="6%">LABOR</th>
        <th border="1" width="8%">AMOUNT</th>
    </tr>

    <tr>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['removal_installation']['plants'])) echo "[*]" ?>Plants</td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['removal_installation']['plants'])) echo $_POST['removal_installation']['plants']?></td>

        <td border="1"><?php if(is_isset_and_not_empty($_POST['other_projects'][0]['description'])) echo $_POST['other_projects'][0]['description']?></td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['other_projects'][0]['material'])) echo $_POST['other_projects'][0]['material']?></td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['other_projects'][0]['labor'])) echo $_POST['other_projects'][0]['labor'] ?></td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['other_projects'][0]['amount'])) echo $_POST['other_projects'][0]['amount']?></td>

    </tr>

    <tr>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['removal_installation']['dirt'])) echo "[*]" ?>Dirt</td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['removal_installation']['dirt'])) echo $_POST['removal_installation']['dirt']?></td>

        <td border="1"><?php if(is_isset_and_not_empty($_POST['other_projects'][1]['description'])) echo $_POST['other_projects'][1]['description']?></td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['other_projects'][1]['material'])) echo $_POST['other_projects'][1]['material']?></td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['other_projects'][1]['labor'])) echo $_POST['other_projects'][1]['labor'] ?></td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['other_projects'][1]['amount'])) echo $_POST['other_projects'][1]['amount']?></td>
    </tr>

    <tr>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['removal_installation']['gravel'])) echo "[*]" ?>Gravel</td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['removal_installation']['gravel'])) echo $_POST['removal_installation']['gravel']?></td>

        <td border="1"><?php if(is_isset_and_not_empty($_POST['other_projects'][2]['description'])) echo $_POST['other_projects'][2]['description']?></td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['other_projects'][2]['material'])) echo $_POST['other_projects'][2]['material']?></td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['other_projects'][2]['labor'])) echo $_POST['other_projects'][2]['labor'] ?></td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['other_projects'][2]['amount'])) echo $_POST['other_projects'][2]['amount']?></td>
    </tr>

    <tr>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['removal_installation']['griding'])) echo "[*]" ?>Griding</td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['removal_installation']['griding'])) echo $_POST['removal_installation']['griding']?></td>

        <td border="1"><?php if(is_isset_and_not_empty($_POST['other_projects'][3]['description'])) echo $_POST['other_projects'][3]['description']?></td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['other_projects'][3]['material'])) echo $_POST['other_projects'][3]['material']?></td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['other_projects'][3]['labor'])) echo $_POST['other_projects'][3]['labor'] ?></td>
        <td border="1"><?php if(is_isset_and_not_empty($_POST['other_projects'][3]['amount'])) echo $_POST['other_projects'][3]['amount']?></td>
    </tr>

    <tr>
        <td style="background-color: #000" colspan="2" border="1"></td>
        <td></td>
        <td></td>
    </tr>

    <tr>
        <td colspan="6">
            <?php if(is_isset_and_not_empty($_POST['projects']['polo_field'])) echo "<span>[*] Polo Field </span>"?>
            <?php if(is_isset_and_not_empty($_POST['projects']['top_dressing'])) echo "<span>[*] Top Dressing </span>" ?>
            <?php if(is_isset_and_not_empty($_POST['projects']['weeding'])) echo "<span>[*] Weeding </span>" ?>

            <?php if(is_isset_and_not_empty($_POST['projects']['bermuda_grass'])) echo "<span>[*] Bermuda Grass </span>" ?>
            <?php if(is_isset_and_not_empty($_POST['projects']['soil_reliever'])) echo "<span>[*] Soil Reliever </span>" ?>
            <?php if(is_isset_and_not_empty($_POST['projects']['mulching_sod'])) echo "<span>[*] Mulching Sod  </span>" ?>

            <?php if(is_isset_and_not_empty($_POST['projects']['celebration_grass'])) echo "<span>[*] Celebration Grass </span>" ?>
            <?php if(is_isset_and_not_empty($_POST['projects']['tree_installation'])) echo "<span>[*] Tree Installation </span>" ?>
            <?php if(is_isset_and_not_empty($_POST['projects']['irrigation'])) echo "<span>[*] Irrigation </span>" ?>

            <?php if(is_isset_and_not_empty($_POST['projects']['419_grass'])) echo "<span>[*] 419 Grass </span>" ?>
            <?php if(is_isset_and_not_empty($_POST['projects']['tree_trimming'])) echo "<span>[*] Tree Trimming </span>" ?>
            <?php if(is_isset_and_not_empty($_POST['projects']['vertical_cut'])) echo "<span>[*] Vertical Cut </span>" ?>

            <?php if(is_isset_and_not_empty($_POST['projects']['fertilizing'])) echo "<span>[*] Fertilizing </span>" ?>
            <?php if(is_isset_and_not_empty($_POST['projects']['hedge_trimming'])) echo "<span>[*] Hedge Trimming </span>" ?>
            <?php if(is_isset_and_not_empty($_POST['projects']['empire_zoysia'])) echo "<span>[*] Empire Zoysia </span>" ?>
        </td>
    </tr>
</table>

<?php if(isset($_POST['order']['contract']) && $_POST['order']['contract'] != ''): ?>
<table cellspacing="0" cellpadding="1" border="1" style="top:5px; margin-top: 10px; padding-top: 10px; font-size: 10px">
    <tr>
        <td><?php echo $_POST['order']['contract'] ?></td>
    </tr>
</table>
<?php endif ?>

<table cellspacing="0" cellpadding="1" border="1" style="top:5px; margin-top: 10px; padding-top: 10px; font-size: 10px">
    <tr>
        <td colspan="5" rowspan="5" style="text-align: center">
            <?php if(is_isset_and_not_empty($_POST['order']['signature'])): ?>
                <img src="<?php echo generate_image_from_signature($_POST['order']['signature']) ?>" height="70">
            <?php endif ?>
            <h4 style="margin: 0; padding: 0"><?php if(get_option( 'order_signature_space' )) echo get_option( 'order_signature_space' ) ?></h4>
        </td>
        <td>TOTAL MATERIALS</td>
        <td>$ <?php echo number_format($totalMaterial, 2) ?></td>
    </tr>
    <tr>
        <td>TOTAL LABOR</td>
        <td>$ <?php echo number_format($totalLabor,2 )?></td>
    </tr>
    <tr>
        <td>TOTAL TAX</td>
        <td>$ <?php echo $tax ?></td>
    </tr>
    <tr>
        <td>DEPOSIT <?php if(isset($_POST['order']['deposit'])) echo $_POST['order']['deposit'] ?>%</td>
        <td>$ <?php echo $deposit ?></td>
    </tr>
    <tr>
        <td>BALANCE DUE</td>
        <td>$ <?php echo $balanceDue ?> </td>
    </tr>
</table>
</body>
</html>
