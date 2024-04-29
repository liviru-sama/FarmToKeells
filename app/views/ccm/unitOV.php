<?php
$tab = 6;

include "topsides.php";
?>
    
</br>  <main class="table">

        
            <section class="table_body">

            <a href="<?php echo URLROOT; ?>/ccm/unitOV" style="text-decoration: none;">
                <h5 class="inline-heading" class = "tab-heading" style="background: #65A534; transform: scale(1.08); padding: 2px;">&nbsp;&nbsp;&nbsp;TRANSPORT UNIT OVERVIEW</h5></a>


            <section class="form">
        <div class="form-container"></br></br></br>
        
            <h1>Generate Report for tansport units over time</br></br></h1>
            <form action="<?php echo URLROOT; ?>/ccm/unitOVD" method="post" >
                <div class="text-field">
                    <label for="start_date" style="font-weight: bold;">Start Date:</label> 
                    <input type="date" id="start_date" name="start_date" required>
                </div>
                <div class="text-field">
                    <label for="end_date" style="font-weight: bold;">End Date:</label> 
                    <input type="date" id="end_date" name="end_date" required>
                </div>
                <div class="text-field">
                    <input type="radio" id="vehicle" name="unit_select" value="vehicle">
                    <label for="vehicle">Vehicles</label><br>

                    <input type="radio" id="driver" name="unit_select" value="driver">
                    <label for="driver">Drivers</label><br>
                </div>
                <input type="submit" value="Generate Report"></br></br>
            </form>
        </div>
    </section></section> </main>

</body>
</html>
