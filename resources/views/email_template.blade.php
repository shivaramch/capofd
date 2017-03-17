<html>
<head>
    <style>
        /***
        User Profile Sidebar by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
***/

        body {
            padding: 0;
            margin: 0;
        }

        .button {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;
        }

        .button2:hover {
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
        }
        html { -webkit-text-size-adjust:none; -ms-text-size-adjust: none;}
        @media only screen and (max-device-width: 680px), only screen and (max-width: 680px) {
            *[class="table_width_100"] {
                width: 96% !important;
            }
            *[class="border-right_mob"] {
                border-right: 1px solid #dddddd;
            }
            *[class="mob_100"] {
                width: 100% !important;
            }
            *[class="mob_center"] {
                text-align: center !important;
            }
            *[class="mob_center_bl"] {
                float: none !important;
                display: block !important;
                margin: 0px auto;
            }
            .iage_footer a {
                text-decoration: none;
                color: #929ca8;
            }
            img.mob_display_none {
                width: 0px !important;
                height: 0px !important;
                display: none !important;
            }
            img.mob_width_50 {
                width: 40% !important;
                height: auto !important;
            }
        }
        .table_width_100 {
            width: 680px;
        }
    </style>
</head>
<body>

<!--
Responsive Email Template by @keenthemes
        A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
        Licensed under MIT
        -->

<div id="mailsub" class="notification" align="center">

    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="min-width: 320px;"><tr><td align="center" bgcolor="#eff3f8">


                <!--[if gte mso 10]>
                <table width="680" border="0" cellspacing="0" cellpadding="0">
                    <tr><td>
                <![endif]-->

                <table border="0" cellspacing="0" cellpadding="0" class="table_width_100" width="100%" style="max-width: 680px; min-width: 300px;">
                    <tr><td>
                            <!-- padding -->
                        </td></tr>
                    <!--header -->
                    <tr><td align="center" bgcolor="#ffffff">
                            <!-- padding -->
                            <table width="90%" border="0" cellspacing="0" cellpadding="0"><div style="height: 30px; line-height: 30px; font-size: 10px;"></div>
                                <tr><td align="center">
                                    </td>
                                    <td align="right">
                                        <!--[endif]--><!--

			</td>
			</tr>
		</table>
		<!-- padding --><div style="height: 50px; line-height: 50px; font-size: 10px;"></div>
                                    </td></tr>
                                <!--header END-->

                                <!--content 1 -->
                                <tr><td align="center" bgcolor="#fbfcfd">
                                        <table width="90%" border="0" cellspacing="0" cellpadding="0">
                                            <tr><td align="center">
                                                    <!-- padding --><div style="height: 60px; line-height: 60px; font-size: 10px;"></div>
                                                    <div style="line-height: 44px;">
                                                        <font face="Arial, Helvetica, sans-serif" size="5" color="#57697e" style="font-size: 34px;">
					<span style="font-family: Arial, Helvetica, sans-serif; font-size: 34px; color: #57697e;">
						Omaha Fire Department
					</span></font>
                                                    </div>
                                                    <!-- padding --><div style="height: 40px; line-height: 40px; font-size: 10px;"></div>
                                                </td></tr>
                                            <tr><td align="center">
                                                   <img src="http://i65.tinypic.com/20pzmur.png" border="0" >
                                                </td></tr>

                                            <tr><td align="center">
                                                    <div style="line-height: 24px;">
                                                        <font face="Arial, Helvetica, sans-serif" size="4" color="#57697e" style="font-size: 15px;">
					<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
					 <p>Hello  {{$officername}} ,</p>
        <br>
    <p>
    {{$firefighter}}({{$personid}}) has just submitted  {{$formname}} application and pending for your approval.{{$content}}
    </p>
					</span></font>
                                                    </div>
                                                    <!-- padding --><div style="height: 40px; line-height: 40px; font-size: 10px;"></div>
                                                </td></tr>


                                            <tr><td align="center">
                                                    <div style="line-height: 24px;">

                                                        <a type="button" class="button button2" value="Click for Application" href="{{$link}}">Click for Application</a>

                                                    </div>
                                                    <!-- padding --><div style="height: 60px; line-height: 60px; font-size: 10px;"> </div>
                                                </td></tr>
                                        </table>
                                    </td></tr>
                                <!--content 1 END-->


                                <!--footer -->
                                <tr><td class="iage_footer" align="center" bgcolor="#ffffff">


                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr><td align="center" style="padding:20px;float:left;width:100%; text-align:center;">

                                                </td></tr>
                                        </table>


                                    </td></tr>
                                <!--footer END-->
                                <tr><td>

                                    </td></tr>
                            </table>
                            <!--[if gte mso 10]>
                            </td></tr>
                            </table>
                            <![endif]-->

                        </td></tr>
                </table>
            </td>
        </tr>
    </table>
</div>
</body>
</html>