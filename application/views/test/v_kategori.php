<!DOCTYPE html>
<html>
<head>
    <title>Select berhubungan dengan codeigniter dan ajax</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
</head>
<body>
    <br/>
    <div class="col-md-6 col-md-offset-3">
        <div class="thumbnail">
            <h4><center>Membuat Select berhubungan dengan codeigiter</center></h4><hr/>
            <form class="form-horizontal">
                <div class="form-group">
                    <label class="control-label col-md-3">Kategori</label>
                    <div class="col-md-8">
                        <select name="kategori" id="kategori" class="form-control">
                            <option value="0">-PILIH-</option>
                            <?php foreach($data->result() as $row):?>
                                <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Sub Kategori</label>
                    <div class="col-md-8">
                        <select name="kategori2" class="kategori2 form-control">
                            <option value="0">-PILIH-</option>
                        </select>
                    </div>
                     
                </div>
            </form>
            <hr/>
        </div>
    </div>
<script type="text/javascript" src="<?php echo base_url().'https://code.jquery.com/jquery-1.12.3.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#kategori').change(function(){
            var id=$('#kategori').val();
            $.ajax({
                url : "<?php echo base_url();?>stoker/get_subkategori",
                method : "POST",
                data : {id: id},
                async : false,
                dataType : 'json',
                success: function(data){
					
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option>'+data[i].name+'</option>';
                    }
                    $('.subkategori').html(data);
                     
                }
            });
        });
    });
</script>
</body>
</html>