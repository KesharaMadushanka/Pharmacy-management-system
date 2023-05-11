<div class="card" style="opacity: 0.9;">
    <div class="card-header">
        Add New Medicine
    </div>
    <div class="card-body">
        <form id='addMedForm' class="row g-3">
            <div class="col-12">
                <label for="" class="form-label">Barcode / Medicine ID</label>
                <input type="text" class="form-control" id="barcode" name="barcode" placeholder="Enter Barcode">
            </div>

            <div class="col-md-6">
                <label for="" class="form-label">Medicine Name</label>
                <input type="text" class="form-control" id="med_name" name="med_name" placeholder="Enter Medicine Name">
            </div>
            <div class="col-md-6">
                <label for="" class="form-label">Generic Name</label>
                <input type="text" class="form-control" id="gen_name" name="gen_name" placeholder="Enter Generic Name">
            </div>

            <div class="col-md-3">
                <label for="" class="form-label">Strength</label>
                <input type="text" class="form-control" id="strength" name="strength"
                    placeholder="in Miligrams">
            </div>
            <div class="col-md-3">
                <label for="" class="form-label">How Many Tablets in a Box</label>
                <input type="text" class="form-control" id="boxTablets" name="boxTablets"
                    placeholder="Tablets in a Single Box">
            </div>
            <div class="col-md-3">
                <label for="" class="form-label">Buying Price</label>
                <input type="text" class="form-control" id="buy" name="buy"
                    placeholder="Buying Price of a tablet">
            </div>

            <div class="col-md-3">
                <label for="" class="form-label">Selling Price</label>
                <input type="text" class="form-control" id="sell" name="sell"
                    placeholder="Selling of a tablet">
            </div>
            
            <div class="col-12">
                <label for="" class="form-label">Medicine Type</label>
                <input type="text" class="form-control" id="med_type" name="med_type" placeholder="Ex: Painkillers">
            </div>
            <div class="col-12">
                <label for="" class="form-label">Manufacturer</label>
                <input type="text" class="form-control" id="manufacturer" name="manufacturer"
                    placeholder="Enter Manufacturer Name">
            </div>


            <div class="col-12">
                <label for="" class="form-label">More Details</label>
                <textarea class="form-control" id="more_details" name="more_details" rows="3"></textarea>
            </div>

            <div class="col-12">
                <input type="submit" value="Add Medicine" class="btn btn-success" id="btnAdd">
                <input type="reset" class="btn btn-warning">
            </div>
        </form>
    </div>
</div>


<script>
$('#btnAdd').click(function(e) {
    e.preventDefault();

    //send data to the route using ajax
    $.ajax({
        url: "../route/medicine/addMed.php",
        type: "post",
        data: $('#addMedForm').serialize(),
        success: function(data) {

            if (data == 0) {
                alert("Success!");
                location.reload();
            } else {
                alert("Error!");
            }

        }
    })
})
</script>