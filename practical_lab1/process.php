<?php
$error = "";
$showBill = False;

if (isset($_POST['calculate'])) {
    $firstinput = $_POST['first'];
    $secondinput = $_POST['second'];
    $thirdinput = $_POST['third'];
    $fourthinput = $_POST['fourth'];
    $fifthinput = $_POST['fifth'];

    if ($firstinput == "")
        $firstinput = 0;
    if ($secondinput == "")
        $secondinput = 0;
    if ($thirdinput == "")
        $thirdinput = 0;
    if ($fourthinput == "")
        $fourthinput = 0;
    if ($fifthinput == "")
        $fifthinput = 0;


    if (
        $firstinput < 0 || $secondinput < 0 ||
        $thirdinput < 0 || $fourthinput < 0 ||
        $fifthinput < 0
    )
        $error = "Please enter positive number only rawrr !!";


    else if ($firstinput > 200)
        $error = "Please enter below 200kwh";
    else if ($secondinput > 100)
        $error = "Please enter below 100kwh";
    else if ($thirdinput > 300)
        $error = "Please enter below 300kwh";
    else if ($fourthinput > 300)
        $error = "Please enter below 300kwh";


    else if ($firstinput + $secondinput + $thirdinput + $fourthinput + $fifthinput == 0)
        $error = "Please enter at leaste one input";

    else {
        $firstcharge = $firstinput * 0.218;
        $secondcharge = $secondinput * 0.334;
        $thirdcharge = $thirdinput * 0.516;
        $fourthcharge = $fourthinput * 0.546;
        $fifthcharge = $fifthinput * 0.571;

        $totalinput = $firstinput + $secondinput + $thirdinput + $fourthinput + $fifthinput;
        $totalcharge = $firstcharge + $secondcharge + $thirdcharge + $fourthcharge + $fifthcharge;

        if ($totalcharge < 3)
            $totalcharge = 3;

        else if ($totalinput > 600) {
            $sst = $totalcharge * 0.06;
            $totalcharge = $totalcharge + $sst;

        }

        $showBill = True;
    }
}
