<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Jarocho Landscaping, Inc.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="images/favicon.ico">
    <link href="<?php echo ORDERS_PLUGIN_ASSETS_PUBLIC ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo ORDERS_PLUGIN_ASSETS_PUBLIC ?>/css/bootstrap-datepicker.css" rel="stylesheet">
    <link href="<?php echo ORDERS_PLUGIN_ASSETS_PUBLIC ?>/js/Autocomplete/jquery.auto-complete.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo ORDERS_PLUGIN_ASSETS_PUBLIC ?>/css/app.css">
    <style>
        .container {
            padding: 0;
        }
        .no-padding {
            padding: 0;
        }
        .col-md-4 {
            padding: 0;
        }

        .margin-allowed {
            margin: 15px;
        }
    </style>
</head>
<body>
<!-- Fixed navbar -->
<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Jarocho Landscaping, Inc.</a>
        </div>
    </div>
</nav>


<div class="container" role="main">
    <div class="container" style="padding: ;">
        <div class="row">
            <form method="post" action="<?php echo get_site_url(); ?>/order/create" id="order-form" target="_blank">
                <div class="col-md-12">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Customer Name</label>
                            <input type="text" class="form-control" value="<?php if(isset($_POST['order']['customer_name'])) echo $_POST['order']['customer_name'] ?>" name="order[customer_name]" >
                        </div>
                        <div class="form-group">
                            <label>Date Order</label>
                            <input type="text" class="form-control date-order" value="<?php if(isset($_POST['order']['date_of_order'])) { echo $_POST['order']['date_of_order']; } else { echo date("Y-m-d"); } ?>" name="order[date_of_order]"  required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?php if(isset($_POST['order']['taken_by'])) echo $_POST['order']['taken_by'] ?>" name="order[taken_by]" placeholder="Bill To" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control disabled" value="<?php echo $next ?>" name="order[order_no]" placeholder="Customer Order No" disabled>
                        </div>
                        <div class="form-group">
                            <label>Appointment Start Date</label>
                            <input type="text" class="form-control datepicker" value="<?php if(isset($_POST['order']['appointment_start'])) echo $_POST['order']['appointment_start'] ?>" name="order[appointment_start]" placeholder="Appointment Start Date" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?php if(isset($_POST['order']['job_name'])) echo $_POST['order']['job_name'] ?>" name="order[job_name]" placeholder="Ship To" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?php if(isset($_POST['order']['job_location'])) echo $_POST['order']['job_location'] ?>" name="order[job_location]" placeholder="Job Location" required>
                        </div>
                        <div class="form-group">
                            <label>Invoice Date</label>
                            <input type="text" class="form-control datepicker" value="<?php if(isset($_POST['order']['invoice_date'])) { echo $_POST['order']['invoice_date']; } else { echo date("Y-m-d"); } ?>" name="order[invoice_date]" placeholder="Invoice Date" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Type</label>
                            <select name="order[type]" class="form-control">
                                <?php if(isset($_POST['order']['type']) && $_POST['order']['type'] === 'invoice'): ?>
                                    <option value="invoice" selected>Invoice</option>
                                <?php else: ?>
                                    <option value="invoice">Invoice</option>
                                <?php endif ?>

                                <?php if(isset($_POST['order']['type']) && $_POST['order']['type'] === 'estimate'): ?>
                                    <option value="estimate" selected>Estimate</option>
                                <?php else: ?>
                                    <option value="estimate">Estimate</option>
                                <?php endif ?>

                                <?php if(isset($_POST['order']['type']) && $_POST['order']['type'] === 'contract'): ?>
                                    <option value="contract" selected>Contract</option>
                                <?php else: ?>
                                    <option value="contract">Contract</option>
                                <?php endif ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control"  name="order[home_phone]" value="<?php if(isset($_POST['order']['home_phone'])) echo $_POST['order']['home_phone'] ?>" placeholder="Home Phone">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="order[work_phone]" value="<?php if(isset($_POST['order']['work_phone'])) echo $_POST['order']['work_phone'] ?>" placeholder="Work Phone">
                        </div>
                        <div class="form-group">
                            <label class="checkbox-inline"><input type="checkbox" name="order[kind][seasonal_contract]" value="<?php if(isset($_POST['order']['kind']['seasonal_contract'])) echo $_POST['order']['kind']['seasonal_contract'] ?>">Seasonal Contract</label>
                            <label class="checkbox-inline"><input type="checkbox" name="order[kind][repeat]" value="<?php if(isset($_POST['order']['kind']['repeat'])) echo $_POST['order']['kind']['repeat'] ?>">Repeat</label>
                            <label class="checkbox-inline"><input type="checkbox" name="order[kind][one_time_job]" value="<?php if(isset($_POST['order']['kind']['one_time_job'])) echo $_POST['order']['kind']['one_time_job'] ?>">One Time Job</label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control datepicker" name="order[appointment_end]" value="<?php if(isset($_POST['order']['appointment_end'])) echo $_POST['order']['appointment_end'] ?>" placeholder="Appointment Completion Date">
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="col-md-6">
                        <h3>Lawn Maintenance</h3>

                        <div class="form-group">
                            <input type="text" class="form-control" name="maintenance[weekly]" placeholder="Weekly" value="<?php if(isset($_POST['maintenance']['weekly'])) echo $_POST['maintenance']['weekly'] ?>">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="maintenance[bi_weekly]" placeholder="Bi-Weekly" value="<?php if(isset($_POST['maintenance']['bi_weekly'])) echo $_POST['maintenance']['bi_weekly'] ?>">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="maintenance[monthly]" placeholder="Monthly" value="<?php if(isset($_POST['maintenance']['monthly'])) echo $_POST['maintenance']['monthly'] ?>">
                        </div>


                        <div class="form-group">
                            <input type="text" class="form-control datepicker" name="maintenance[start_date]" placeholder="Start Date" value="<?php if(isset($_POST['maintenance']['start_date'])) echo $_POST['maintenance']['start_date'] ?>">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control datepicker" name="maintenance[end_date]" placeholder="End Date" value="<?php if(isset($_POST['maintenance']['end_date'])) echo $_POST['maintenance']['end_date'] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h3>Spring Clean-Up</h3>

                        <div class="form-group">
                            <input type="text" class="form-control" name="spring_clean[power_ranking]" placeholder="Power Ranking" value="<?php if(isset($_POST['spring_clean']['power_ranking'])) echo $_POST['spring_clean']['power_ranking'] ?>">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="spring_clean[moving_trimming]" placeholder="Moving Trimming Maintained Areas" value="<?php if(isset($_POST['spring_clean']['moving_trimming'])) echo $_POST['spring_clean']['moving_trimming'] ?>">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="spring_clean[clean_up]" placeholder="Clean Up Turf/Bed Areas" value="<?php if(isset($_POST['spring_clean']['clean_up'])) echo $_POST['spring_clean']['clean_up'] ?>">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="spring_clean[cutting_back]" placeholder="Cutting back of Perennials" value="<?php if(isset($_POST['spring_clean']['cutting_back'])) echo $_POST['spring_clean']['cutting_back'] ?>">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="spring_clean[pruning]" placeholder="Pruning (Trim & Shape)" value="<?php if(isset($_POST['spring_clean']['pruning'])) echo $_POST['spring_clean']['pruning'] ?>">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="spring_clean[aeration]" placeholder="Aeration" value="<?php if(isset($_POST['spring_clean']['aeration'])) echo $_POST['spring_clean']['aeration'] ?>">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="spring_clean[off_site_disposal]" placeholder="Off Site Disposal of debris" value="<?php if(isset($_POST['spring_clean']['off_site_disposal'])) echo $_POST['spring_clean']['off_site_disposal'] ?>">
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="col-md-6">
                        <h3>Fertilization / Weed Control Program</h3>

                        <div class="col-md-12" style="padding: 0;">
                            <div class="form-group col-md-6 no-padding">
                                <input type="text" class="form-control" name="fertilization[0][description]" value="<?php if(isset($_POST['fertilization'][0]['description'])) echo $_POST['fertilization'][0]['description'] ?>" placeholder="Description">
                            </div>
                            <div class="form-group col-md-2 no-padding">
                                <input type="number" class="form-control" name="fertilization[0][material]" value="<?php if(isset($_POST['fertilization'][0]['material'])) echo $_POST['fertilization'][0]['material'] ?>" placeholder="Material">
                            </div>
                            <div class="form-group col-md-2 no-padding">
                                <input type="number" class="form-control" name="fertilization[0][labor]" value="<?php if(isset($_POST['fertilization'][0]['labor'])) echo $_POST['fertilization'][0]['labor'] ?>" placeholder="Labor">
                            </div>
                            <div class="form-group col-md-2 no-padding">
                                <input type="number" class="form-control" name="fertilization[0][amount]" value="<?php if(isset($_POST['fertilization'][0]['amount'])) echo $_POST['fertilization'][0]['amount'] ?>" placeholder="Qty">
                            </div>
                        </div>
                        <div class="col-md-12" style="padding: 0;">
                            <div class="form-group col-md-6 no-padding">
                                <input type="text" class="form-control" name="fertilization[1][description]" value="<?php if(isset($_POST['fertilization'][1]['description'])) echo $_POST['fertilization'][1]['description'] ?>" placeholder="Description">
                            </div>
                            <div class="form-group col-md-2 no-padding">
                                <input type="number" class="form-control" name="fertilization[1][material]" value="<?php if(isset($_POST['fertilization'][1]['material'])) echo $_POST['fertilization'][1]['material'] ?>" placeholder="Material">
                            </div>
                            <div class="form-group col-md-2 no-padding">
                                <input type="number" class="form-control" name="fertilization[1][labor]" value="<?php if(isset($_POST['fertilization'][1]['labor'])) echo $_POST['fertilization'][1]['labor'] ?>" placeholder="Labor">
                            </div>
                            <div class="form-group col-md-2 no-padding">
                                <input type="number" class="form-control" name="fertilization[1][amount]" value="<?php if(isset($_POST['fertilization'][1]['amount'])) echo $_POST['fertilization'][1]['amount'] ?>" placeholder="Qty">
                            </div>
                        </div>
                        <div class="col-md-12" style="padding: 0;">
                            <div class="form-group col-md-6 no-padding">
                                <input type="text" class="form-control" name="fertilization[2][description]" value="<?php if(isset($_POST['fertilization'][2]['description'])) echo $_POST['fertilization'][2]['description'] ?>" placeholder="Description">
                            </div>
                            <div class="form-group col-md-2 no-padding">
                                <input type="number" class="form-control" name="fertilization[2][material]" value="<?php if(isset($_POST['fertilization'][2]['material'])) echo $_POST['fertilization'][2]['material'] ?>" placeholder="Material">
                            </div>
                            <div class="form-group col-md-2 no-padding">
                                <input type="number" class="form-control" name="fertilization[2][labor]" value="<?php if(isset($_POST['fertilization'][2]['labor'])) echo $_POST['fertilization'][2]['labor'] ?>" placeholder="Labor">
                            </div>
                            <div class="form-group col-md-2 no-padding">
                                <input type="number" class="form-control" name="fertilization[2][amount]" value="<?php if(isset($_POST['fertilization'][2]['amount'])) echo $_POST['fertilization'][2]['amount'] ?>" placeholder="Qty">
                            </div>
                        </div>
                        <div class="col-md-12" style="padding: 0;">
                            <div class="form-group col-md-6 no-padding">
                                <input type="text" class="form-control" name="fertilization[3][description]" value="<?php if(isset($_POST['fertilization'][3]['description'])) echo $_POST['fertilization'][3]['description'] ?>" placeholder="Description">
                            </div>
                            <div class="form-group col-md-2 no-padding">
                                <input type="number" class="form-control" name="fertilization[3][material]" value="<?php if(isset($_POST['fertilization'][3]['material'])) echo $_POST['fertilization'][3]['material'] ?>" placeholder="Material">
                            </div>
                            <div class="form-group col-md-2 no-padding">
                                <input type="number" class="form-control" name="fertilization[3][labor]" value="<?php if(isset($_POST['fertilization'][3]['labor'])) echo $_POST['fertilization'][3]['labor'] ?>" placeholder="Labor">
                            </div>
                            <div class="form-group col-md-2 no-padding">
                                <input type="number" class="form-control" name="fertilization[3][amount]" value="<?php if(isset($_POST['fertilization'][3]['amount'])) echo $_POST['fertilization'][3]['amount'] ?>" placeholder="Qty">
                            </div>
                        </div>
                        <div class="col-md-12" style="padding: 0;">
                            <div class="form-group col-md-6 no-padding">
                                <input type="text" class="form-control" name="fertilization[4][description]" value="<?php if(isset($_POST['fertilization'][4]['description'])) echo $_POST['fertilization'][4]['description'] ?>" placeholder="Description">
                            </div>
                            <div class="form-group col-md-2 no-padding">
                                <input type="number" class="form-control" name="fertilization[4][material]" value="<?php if(isset($_POST['fertilization'][4]['material'])) echo $_POST['fertilization'][4]['material'] ?>" placeholder="Material">
                            </div>
                            <div class="form-group col-md-2 no-padding">
                                <input type="number" class="form-control" name="fertilization[4][labor]" value="<?php if(isset($_POST['fertilization'][4]['labor'])) echo $_POST['fertilization'][4]['labor'] ?>" placeholder="Labor">
                            </div>
                            <div class="form-group col-md-2 no-padding">
                                <input type="number" class="form-control" name="fertilization[4][amount]" value="<?php if(isset($_POST['fertilization'][4]['amount'])) echo $_POST['fertilization'][4]['amount'] ?>" placeholder="Qty">
                            </div>
                        </div>
                        <div class="col-md-12" style="padding: 0;">
                            <div class="form-group col-md-6 no-padding">
                                <input type="text" class="form-control" name="fertilization[5][description]" value="<?php if(isset($_POST['fertilization'][5]['description'])) echo $_POST['fertilization'][5]['description'] ?>" placeholder="Description">
                            </div>
                            <div class="form-group col-md-2 no-padding">
                                <input type="number" class="form-control" name="fertilization[5][material]" value="<?php if(isset($_POST['fertilization'][5]['material'])) echo $_POST['fertilization'][5]['material'] ?>" placeholder="Material">
                            </div>
                            <div class="form-group col-md-2 no-padding">
                                <input type="number" class="form-control" name="fertilization[5][labor]" value="<?php if(isset($_POST['fertilization'][5]['labor'])) echo $_POST['fertilization'][5]['labor'] ?>" placeholder="Labor">
                            </div>
                            <div class="form-group col-md-2 no-padding">
                                <input type="number" class="form-control" name="fertilization[5][amount]" value="<?php if(isset($_POST['fertilization'][5]['amount'])) echo $_POST['fertilization'][5]['amount'] ?>" placeholder="Qty">
                            </div>
                        </div>
                        <div class="col-md-12" style="padding: 0;">
                            <div class="form-group col-md-6 no-padding">
                                <input type="text" class="form-control" name="fertilization[6][description]" value="<?php if(isset($_POST['fertilization'][6]['description'])) echo $_POST['fertilization'][6]['description'] ?>" placeholder="Description">
                            </div>
                            <div class="form-group col-md-2 no-padding">
                                <input type="number" class="form-control" name="fertilization[6][material]" value="<?php if(isset($_POST['fertilization'][6]['material'])) echo $_POST['fertilization'][6]['material'] ?>" placeholder="Material">
                            </div>
                            <div class="form-group col-md-2 no-padding">
                                <input type="number" class="form-control" name="fertilization[6][labor]" value="<?php if(isset($_POST['fertilization'][6]['labor'])) echo $_POST['fertilization'][6]['labor'] ?>" placeholder="Labor">
                            </div>
                            <div class="form-group col-md-2 no-padding">
                                <input type="number" class="form-control" name="fertilization[6][amount]" value="<?php if(isset($_POST['fertilization'][6]['amount'])) echo $_POST['fertilization'][6]['amount'] ?>" placeholder="Qty">
                            </div>
                        </div>
                        <div class="col-md-12" style="padding: 0;">
                            <div class="form-group col-md-6 no-padding">
                                <input type="text" class="form-control" name="fertilization[7][description]" value="<?php if(isset($_POST['fertilization'][7]['description'])) echo $_POST['fertilization'][7]['description'] ?>" placeholder="Description">
                            </div>
                            <div class="form-group col-md-2 no-padding">
                                <input type="number" class="form-control" name="fertilization[7][material]" value="<?php if(isset($_POST['fertilization'][7]['material'])) echo $_POST['fertilization'][7]['material'] ?>" placeholder="Material">
                            </div>
                            <div class="form-group col-md-2 no-padding">
                                <input type="number" class="form-control" name="fertilization[7][labor]" value="<?php if(isset($_POST['fertilization'][7]['labor'])) echo $_POST['fertilization'][7]['labor'] ?>" placeholder="Labor">
                            </div>
                            <div class="form-group col-md-2 no-padding">
                                <input type="number" class="form-control" name="fertilization[7][amount]" value="<?php if(isset($_POST['fertilization'][7]['amount'])) echo $_POST['fertilization'][7]['amount'] ?>" placeholder="Qty">
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <h3>Fall Clean-Up</h3>

                        <div class="form-group">
                            <input type="text" class="form-control" name="fall_clean[bi_weekly]" placeholder="Bi-Weekly Mowing Maintained Areas" value="<?php if(isset($_POST['fall_clean']['bi_weekly'])) echo $_POST['fall_clean']['bi_weekly'] ?>">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="fall_clean[clean_up]" placeholder="Clean Up Turf/Bed Areas" value="<?php if(isset($_POST['fall_clean']['clean_up'])) echo $_POST['fall_clean']['clean_up'] ?>">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="fall_clean[cutting_back]" placeholder="Cutting back Perennials" value="<?php if(isset($_POST['fall_clean']['cutting_back'])) echo $_POST['fall_clean']['cutting_back'] ?>">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="fall_clean[pruning]" placeholder="Pruning (Trim & Shape)" value="<?php if(isset($_POST['fall_clean']['pruning'])) echo $_POST['fall_clean']['pruning'] ?>">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="fall_clean[aeration]" placeholder="Aeration" value="<?php if(isset($_POST['fall_clean']['aeration'])) echo $_POST['fall_clean']['aeration'] ?>">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="fall_clean[winter_protection]" placeholder="Winter Protection" value="<?php if(isset($_POST['fall_clean']['winter_protection'])) echo $_POST['fall_clean']['winter_protection'] ?>">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="fall_clean[transplanting]" placeholder="Transplanting" value="<?php if(isset($_POST['fall_clean']['transplanting'])) echo $_POST['fall_clean']['transplanting'] ?>">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="fall_clean[off_site]" placeholder="Off-Site Disposal of debris" value="<?php if(isset($_POST['fall_clean']['off_site'])) echo $_POST['fall_clean']['off_site'] ?>">
                        </div>


                        <div class="form-group">
                            <input type="text" class="form-control datepicker" name="fall_clean[start_date]" placeholder="Start Date" value="<?php if(isset($_POST['fall_clean']['start_date'])) echo $_POST['fall_clean']['start_date'] ?>">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control datepicker" name="fall_clean[end_date]" placeholder="End Date" value="<?php if(isset($_POST['fall_clean']['end_date'])) echo $_POST['fall_clean']['end_date'] ?>">
                        </div>

                    </div>
                </div>

                <div class="col-md-12">

                    <div class="col-md-6">
                        <h3>Bed Care</h3>

                        <div class="form-group">
                            <input type="text" class="form-control" name="bed_care[applications]" placeholder="Applications of Weed Control Maintenance Beds" value="<?php if(isset($_POST['bed_care']['applications'])) echo $_POST['bed_care']['applications'] ?>">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="bed_care[fertilization]" placeholder="Fertilization of Maintenance Beds" value="<?php if(isset($_POST['bed_care']['fertilization'])) echo $_POST['bed_care']['fertilization'] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h3>Gutter Cleaning</h3>

                        <div class="form-group">
                            <input type="text" class="form-control" name="gutter_cleaning[spring]" placeholder="Spring" value="<?php if(isset($_POST['gutter_cleaning']['spring'])) echo $_POST['gutter_cleaning']['spring'] ?>">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="gutter_cleaning[fall]" placeholder="Fall" value="<?php if(isset($_POST['gutter_cleaning']['fall'])) echo $_POST['gutter_cleaning']['fall'] ?>">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="gutter_cleaning[other]" placeholder="Other" value="<?php if(isset($_POST['gutter_cleaning']['other'])) echo $_POST['gutter_cleaning']['other'] ?>">
                        </div>
                    </div>
                </div>

                <div class="col-md-12">

                    <div class="col-md-6">
                        <h3>Removal/Installation</h3>
                        <div class="form-group">
                            <input type="text" class="form-control" name="removal_installation[plants]" value="<?php if(isset($_POST['removal_installation']['plants'])) echo $_POST['removal_installation']['plants'] ?>" placeholder="Plants">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="removal_installation[dirt]" value="<?php if(isset($_POST['removal_installation']['dirt'])) echo $_POST['removal_installation']['dirt'] ?>" placeholder="Dirt">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="removal_installation[gravel]" value="<?php if(isset($_POST['removal_installation']['gravel'])) echo $_POST['removal_installation']['gravel'] ?>" placeholder="Gravel">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="removal_installation[griding]" value="<?php if(isset($_POST['removal_installation']['griding'])) echo $_POST['removal_installation']['griding'] ?>" placeholder="Griding">
                        </div>

                        <div class="form-group">
                            <label class="checkbox-inline"><input type="checkbox" name="projects[polo_field]" value="ok" <?php if(isset($_POST['projects']['polo_field'])) echo "checked" ?>>Polo Field</label>
                            <label class="checkbox-inline"><input type="checkbox" name="projects[top_dressing]" value="ok" <?php if(isset($_POST['projects']['top_dressing'])) echo "checked" ?>>Top Dressing</label>
                            <label class="checkbox-inline"><input type="checkbox" name="projects[weeding]" value="ok" <?php if(isset($_POST['projects']['weeding'])) echo "checked" ?>>Weeding </label>
                        </div>

                        <div class="form-group">
                            <label class="checkbox-inline"><input type="checkbox" name="projects[bermuda_grass]" value="ok" <?php if(isset($_POST['projects']['bermuda_grass'])) echo "checked" ?>>Bermuda Grass</label>
                            <label class="checkbox-inline"><input type="checkbox" name="projects[soil_reliever]" value="ok" <?php if(isset($_POST['projects']['soil_reliever'])) echo "checked" ?>>Soil Reliever</label>
                            <label class="checkbox-inline"><input type="checkbox" name="projects[mulching_sod]" value="ok" <?php if(isset($_POST['projects']['mulching_sod'])) echo "checked" ?>>Mulching Sod </label>
                        </div>

                        <div class="form-group">
                            <label class="checkbox-inline"><input type="checkbox" name="projects[celebration_grass]" <?php if(isset($_POST['projects']['celebration_grass'])) echo "checked" ?> value="ok">Celebration Grass</label>
                            <label class="checkbox-inline"><input type="checkbox" name="projects[tree_installation]" <?php if(isset($_POST['projects']['tree_installation'])) echo "checked" ?> value="ok">Tree Installation</label>
                            <label class="checkbox-inline"><input type="checkbox" name="projects[irrigation]" <?php if(isset($_POST['projects']['irrigation'])) echo "checked" ?> value="ok">Irrigation</label>
                        </div>

                        <div class="form-group">
                            <label class="checkbox-inline"><input type="checkbox" name="projects[419_grass]" <?php if(isset($_POST['projects']['419_grass'])) echo "checked" ?> value="ok">419 Grass</label>
                            <label class="checkbox-inline"><input type="checkbox" name="projects[tree_trimming]" <?php if(isset($_POST['projects']['tree_trimming'])) echo "checked" ?> value="ok">Tree Trimming</label>
                            <label class="checkbox-inline"><input type="checkbox" name="projects[vertical_cut]" <?php if(isset($_POST['projects']['vertical_cut'])) echo "checked" ?> value="ok">Vertical Cut</label>
                        </div>

                        <div class="form-group">
                            <label class="checkbox-inline"><input type="checkbox" name="projects[fertilizing]" <?php if(isset($_POST['projects']['fertilizing'])) echo "checked" ?>  value="ok">Fertilizing</label>
                            <label class="checkbox-inline"><input type="checkbox" name="projects[hedge_trimming]" <?php if(isset($_POST['projects']['hedge_trimming'])) echo "checked" ?>  value="ok">Hedge Trimming</label>
                            <label class="checkbox-inline"><input type="checkbox" name="projects[empire_zoysia]" <?php if(isset($_POST['projects']['empire_zoysia'])) echo "checked" ?>  value="ok">Empire Zoysia</label>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <h3>Other Project</h3>

                        <div class="col-md-12" style="padding: 0;">
                            <div class="form-group col-md-6 no-padding">
                                <input type="text" class="form-control" name="other_projects[0][description]" value="<?php if(isset($_POST['other_projects'][0]['description'])) echo $_POST['other_projects'][0]['description'] ?>" placeholder="Description">
                            </div>
                            <div class="form-group col-md-2 no-padding">
                                <input type="number" class="form-control" name="other_projects[0][material]" value="<?php if(isset($_POST['other_projects'][0]['material'])) echo $_POST['other_projects'][0]['material'] ?>" placeholder="Material">
                            </div>
                            <div class="form-group col-md-2 no-padding">
                                <input type="number" class="form-control" name="other_projects[0][labor]" value="<?php if(isset($_POST['other_projects'][0]['labor'])) echo $_POST['other_projects'][0]['labor'] ?>" placeholder="Labor">
                            </div>
                            <div class="form-group col-md-2 no-padding">
                                <input type="number" class="form-control" name="other_projects[0][amount]" value="<?php if(isset($_POST['other_projects'][0]['amount'])) echo $_POST['other_projects'][0]['amount'] ?>" placeholder="Qty">
                            </div>
                        </div>
                        <div class="col-md-12" style="padding: 0;">
                            <div class="form-group col-md-6 no-padding">
                                <input type="text" class="form-control" name="other_projects[1][description]" value="<?php if(isset($_POST['other_projects'][1]['description'])) echo $_POST['other_projects'][1]['description'] ?>" placeholder="Description">
                            </div>
                            <div class="form-group col-md-2 no-padding">
                                <input type="number" class="form-control" name="other_projects[1][material]" value="<?php if(isset($_POST['other_projects'][1]['material'])) echo $_POST['other_projects'][1]['material'] ?>" placeholder="Material">
                            </div>
                            <div class="form-group col-md-2 no-padding">
                                <input type="number" class="form-control" name="other_projects[1][labor]" value="<?php if(isset($_POST['other_projects'][1]['labor'])) echo $_POST['other_projects'][1]['labor'] ?>" placeholder="Labor">
                            </div>
                            <div class="form-group col-md-2 no-padding">
                                <input type="number" class="form-control" name="other_projects[1][amount]" value="<?php if(isset($_POST['other_projects'][1]['amount'])) echo $_POST['other_projects'][1]['amount'] ?>" placeholder="Qty">
                            </div>
                        </div>
                        <div class="col-md-12" style="padding: 0;">
                            <div class="form-group col-md-6 no-padding">
                                <input type="text" class="form-control" name="other_projects[2][description]" value="<?php if(isset($_POST['other_projects'][2]['description'])) echo $_POST['other_projects'][2]['description'] ?>" placeholder="Description">
                            </div>
                            <div class="form-group col-md-2 no-padding">
                                <input type="number" class="form-control" name="other_projects[2][material]" value="<?php if(isset($_POST['other_projects'][2]['material'])) echo $_POST['other_projects'][2]['material'] ?>" placeholder="Material">
                            </div>
                            <div class="form-group col-md-2 no-padding">
                                <input type="number" class="form-control" name="other_projects[2][labor]" value="<?php if(isset($_POST['other_projects'][2]['labor'])) echo $_POST['other_projects'][2]['labor'] ?>" placeholder="Labor">
                            </div>
                            <div class="form-group col-md-2 no-padding">
                                <input type="number" class="form-control" name="other_projects[2][amount]" value="<?php if(isset($_POST['other_projects'][2]['amount'])) echo $_POST['other_projects'][2]['amount'] ?>" placeholder="Qty">
                            </div>
                        </div>
                        <div class="col-md-12" style="padding: 0;">
                            <div class="form-group col-md-6 no-padding">
                                <input type="text" class="form-control" name="other_projects[3][description]" value="<?php if(isset($_POST['other_projects'][3]['description'])) echo $_POST['other_projects'][3]['description'] ?>" placeholder="Description">
                            </div>
                            <div class="form-group col-md-2 no-padding">
                                <input type="number" class="form-control" name="other_projects[3][material]" value="<?php if(isset($_POST['other_projects'][3]['material'])) echo $_POST['other_projects'][3]['material'] ?>" placeholder="Material">
                            </div>
                            <div class="form-group col-md-2 no-padding">
                                <input type="number" class="form-control" name="other_projects[3][labor]" value="<?php if(isset($_POST['other_projects'][3]['labor'])) echo $_POST['other_projects'][3]['labor'] ?>" placeholder="Labor">
                            </div>
                            <div class="form-group col-md-2 no-padding">
                                <input type="number" class="form-control" name="other_projects[3][amount]" value="<?php if(isset($_POST['other_projects'][3]['amount'])) echo $_POST['other_projects'][3]['amount'] ?>" placeholder="Qty">
                            </div>
                        </div>

                        <div class="col-md-12 no-padding">
                            <div class="form-group col-md-12 no-padding">
                                <label>Deposit</label>

                                <select name="order[deposit]" class="form-control">
                                    <option value="0">0</option>
                                    <option value="5">5%</option>
                                    <option value="10">10 %</option>
                                    <option value="15">15 %</option>
                                    <option value="20">20 %</option>
                                    <option value="25">25 %</option>
                                    <option value="30">30 %</option>
                                    <option value="35">35 %</option>
                                    <option value="40">40 %</option>
                                    <option value="45">45 %</option>
                                    <option value="50">50 %</option>
                                    <option value="55">55 %</option>
                                    <option value="60">60 %</option>
                                    <option value="65">65 %</option>
                                    <option value="70">70 %</option>
                                    <option value="75">75 %</option>
                                    <option value="80">80 %</option>
                                    <option value="85">85 %</option>
                                    <option value="90">90 %</option>
                                    <option value="95">95 %</option>
                                    <option value="100">100 %</option>
                                </select>

                            </div>

                            <div class="form-group col-md-12 no-padding">
                                <label>Tax</label>
                                <input type="number" class="form-control" name="order[tax]" value="<?php if(isset($_POST['order']['tax'])) echo $_POST['order']['tax'] ?>" placeholder="Tax" required>

                                <input type="hidden" class="form-control" name="order[signature]" value="<?php if(isset($_POST['order']['signature'])) echo $_POST['order']['signature'] ?>">
                                <input type="hidden" class="form-control" name="preview" value="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12" style="padding: 15px; display: none" id="contract">
                    <label>Terms and conditions</label>
                    <textarea class="form-control" name="order[contract]"><?php if(get_option( 'order_contract_space' )) echo get_option( 'order_contract_space' ) ?></textarea>
                </div>

                <div class="col-md-12" style="padding-bottom: 15px; text-align: center">
                    <div id="signature"></div>
                    <label><?php if(get_option( 'order_signature_space' )) echo get_option( 'order_signature_space' ) ?></label>
                </div>

                <div class="col-md-12 margin-allowed">
                    <input type="button" class="btn btn-info btn-block" value="Clear signature" id="clear-sign">
                </div>

                <div class="col-md-12 margin-allowed">
                    <input type="submit" class="btn btn-success btn-block" value="Preview the form" id="submit-and-preview">
                </div>

                <div class="col-md-12 margin-allowed">
                    <input type="submit" class="btn btn-primary btn-block" value="Upload Form" id="submit-and-save">
                </div>

                <br />
                <br />
            </form>
        </div>
    </div>

</div>


<script src="<?php echo ORDERS_PLUGIN_ASSETS_PUBLIC ?>/js/app.js"></script>
<script src="<?php echo ORDERS_PLUGIN_ASSETS_PUBLIC ?>/js/jquery-2.2.4.min.js"></script>
<script src="<?php echo ORDERS_PLUGIN_ASSETS_PUBLIC ?>/js/bootstrap.min.js"></script>
<script src="<?php echo ORDERS_PLUGIN_ASSETS_PUBLIC ?>/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo ORDERS_PLUGIN_ASSETS_PUBLIC ?>/js/jSignature.min.js"></script>
<script src="<?php echo ORDERS_PLUGIN_ASSETS_PUBLIC ?>/js/Autocomplete/jquery.auto-complete.min.js"></script>
<script>
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd'
    });
    $('.date-order').datepicker({
        format: 'yyyy-mm-dd'
    });

    var $sigdiv = $("#signature")
    $sigdiv.jSignature()

    $("#signature").bind('change', function(e) {
        var data = $sigdiv.jSignature("getData")
        $( "input[name='order[signature]']" ).val(data);
    })

    $("#clear-sign").click(function(e){
        e.preventDefault();
        $sigdiv.jSignature("reset")
    })

    $("#submit-and-save").click(function(e){
        $("#order-form").removeAttr('target');
        $( "input[name='preview']" ).val("");
    })

    $("#submit-and-preview").click(function(e){
        $("#order-form").attr('target','_blank');
        $( "input[name='preview']" ).val("ok");
    })

    $("input[name='order[customer_name]']").autoComplete({
        source: function(query, response){
            $.ajax({
                type: 'post',
                url: '<?php echo admin_url('admin-ajax.php', null); ?>',
                data: 'action=autocomplete_action&query='+query,
                dataType: 'json',
                success: function(data) {
                    response(data);
                },
            });
        },
        renderItem: function (item, search){
            if(typeof item.name != 'undefined'){
                return '<div class="autocomplete-suggestion" data-val="' + item.name + '" data-object=\''+ JSON.stringify(item) +'\'>' + item.name + '</div>';
            } else {
                return '<div></div>';
            }
        },
        onSelect: function(e, term, item){
            var object = $(item).data("object")

            if(object){
                $("input[name='order[home_phone]']").val(object.home_phone);
                $("input[name='order[work_phone]']").val(object.work_phone);
                $("input[name='order[job_location]']").val(object.job_location);
            }

        }
    });

    $(document).off("change", "select[name='order[type]']").on("change", "select[name='order[type]']", function (e) {
        e.preventDefault();
        var _action = $(this).val();

        if(_action == "contract"){
            $('#contract').show();
        } else {
            $('#contract').hide();
        }

    });
</script>
</body>
</html>
