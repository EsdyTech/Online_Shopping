   <div class="navbar navbar-inverse">
        <div class="navbar-inner">
            <div class="pull-right">
                <form name="clock">
                    <i id="clock" class="icon-time"></i>
                    <input  class="span2" id="trans" type="submit"  name="face" value="">
                </form>
            </div>
            <div class="date">
                <i class="icon-calendar " id="clock"></i>
                <?php
                $Today = date('y:m:d');
                $new = date('l, F d, Y', strtotime($Today));
                echo $new;
                ?>
            </div>
            <div class="welcome">
            <br />
<font color="#FFFFFF" face="Times New Roman, Times, serif" size="2"><marquee scrollamount="2" behavior="alternate">DASLAT ENTERPRISE (ND Final Project)</marquee></font>
            </div>
        </div>
    </div>