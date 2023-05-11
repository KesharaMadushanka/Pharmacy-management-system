<div class="card" style="opacity: 0.9;">
    <div class="card-header">
        EMP Register
    </div>
    <div class="card-body" >
        <form id="empRegistrationForm">
            <div class="form-group mt-2">
                <label for="">EMP ID</label>
                <input type="text" id="empId" name="empId" class="form-control" placeholder="Enter EMP ID">
            </div>

            <div class="form-group mt-2">
                <label for="">EMP Name</label>
                <input type="text" id="empName" name="empName" class="form-control" placeholder="Enter EMP Name">
            </div>
            <div class="form-group mt-2">
                <label for="">EMP Email</label>
                <input type="email" id="empEmail" name="empEmail" class="form-control" placeholder="Enter EMP Email">
            </div>
            <div class="form-group mt-2">
                <label for="">EMP NIC</label>
                <input type="text" id="empNic" name="empNic" class="form-control" placeholder="Enter EMP NIC">
            </div>
            <div class="form-group mt-2">
                <label for="">EMP Tel</label>
                <input type="text" id="empTel" name="empTel" class="form-control" placeholder="Enter EMP Phone Number">
            </div>
            <div class="form-group mt-2">
                <label for="">EMP DOB</label>
                <input type="date" id="empDob" name="empDob" class="form-control" placeholder="Enter EMP DOB">
            </div>
            <div class="form-group mt-2">
                <input type="submit" value="Submit" class="btn btn-success" id="btnSave">
                <input type="reset"  class="btn btn-outline-danger">
            </div>
        </form>
    </div>
</div>


<script>
    $('#btnSave').click(function(e){
        e.preventDefault();
        
        //send data to the route using ajax
        $.ajax({
            url:"../route/emp/register.php",
            type:"post",
            data:$('#empRegistrationForm').serialize(),
            success:function(data){

                if(data == 0){
                    alert ("Success!");
                    location.reload();
                }else{
                    alert ("Error!");
                }
                
            }
        })
    })
</script>