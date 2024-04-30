<?php
$tab = 3;

include "topsides.php";
?>
    
</br>  <main class="table">

        
            <section class="table_body">

            <a href="<?php echo URLROOT; ?>/ccm/purchaseOV" style="text-decoration: none;">
                <h5 class="inline-heading" class = "tab-heading" style="background: #65A534; transform: scale(1.08); padding: 2px;">&nbsp;&nbsp;&nbsp;PURCHASE ORDER OVERVIEW</h5></a>


            <section class="form">
        <div class="form-container"></br></br></br>
        
            <h1>Generate Report for purchase orders over time</br></br></h1>
            <form action="<?php echo URLROOT; ?>/ccm/purchaseOV" method="post" >
                <div class="text-field">
                    <label for="start_date" style="font-weight: bold;">Start Date:</label> 
                    <input type="date" id="start_date" name="start_date" required>
                </div>
                <div class="error" id="startdate-error"><?= $data['errors']['startdate_err']; ?></div>
                <div class="text-field">
                    <label for="end_date" style="font-weight: bold;">End Date:</label> 
                    <input type="date" id="end_date" name="end_date" required>
                </div>
                <div class="error" id="enddate-error"><?= $data['errors']['enddate_err']; ?></div>
                <input type="submit" value="Generate Report"></br></br>
            </form>
        </div>
    </section></section> </main>

</body>
</html>
