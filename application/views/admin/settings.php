<style>
details > summary {
  padding: 4px;
  width: 200px;
  background-color: #eeeeee;
  border: none;
  box-shadow: 1px 1px 2px #bbbbbb;
  cursor: pointer;
}

details > p {
  background-color: #eeeeee;
  padding: 4px;
  margin: 0;
  box-shadow: 1px 1px 2px #bbbbbb;
}
</style>
<?php if($this->session->flashdata('available')){ ?>
    <?php echo $this->session->flashdata('available'); ?>
<?php } ?>
<?php if($this->session->flashdata('not_available')){ ?>
    <?php echo $this->session->flashdata('not_available'); ?>
<?php } ?>
<?php if($this->session->flashdata('deactivate_success')){ ?>
    <?php echo $this->session->flashdata('deactivate_success'); ?>
<?php } ?>
<?php if($this->session->flashdata('activate_success')){ ?>
    <?php echo $this->session->flashdata('activate_success'); ?>
<?php } ?>
<details>
  <summary>Add Banner</summary>
  <p>
      <table class="w3-table-all">
        <thead>
          <tr class="w3-light-grey w3-hover-red">
            <th>Banner Image</th>
          </tr>
        </thead>
        <tr class="w3-hover-green">
<!---->
                 <?//php if(!empty($admin_data)):?>
                    <?//php foreach($admin_data as $admin):?>
                            <?php if(empty($admin['bannner_image'])||($admin['bannner_image']=='NULL')): ?>
                                <form action="<?php echo base_url('admin/add_banner/submit');?>" method="post" enctype="multipart/form-data">
                                    <input type="file" name="my_bannner_image">
                                    <input type="hidden" name="id" value="<?//php echo $admin['admin_id'];?>">
                                    <div>
                                        <div class="w3-third">                                   
                                            <input type="text" name="banner_name" class="form-control" placeholder="Enter Name Of banner">
                                            <input type="text" name="banner_description" class="form-control" placeholder="Enter Description Of banner">
                                        </div>
                                        <div class="w3-twothird">
                                            <div style="padding-left:60px!important;"><button type="submit"><i class="fa fa-plus" style="font-size:28px;color:red">ADD</i></button></div>
                                        </div>
                                    </div>
                                </form>
                            <?php endif;?>
                    <?//php endforeach;?>
                <?//php endif;?>
<!---->
        </tr>
      </table>
  </p>
</details>



    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php if(!empty($banner_data)):?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>id</th>
                    <th>Banner Name</th>
                    <th>Banner Description</th>
                    <th>Banner Image</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <?php foreach($banner_data as $banner):?>
                    <tr class="w3-hover-grey">
                        <td><?php echo $banner['id'];?></td>
                        <td><?php echo $banner['banner_name'];?></td>
                        <td><?php echo $banner['banner_description'];?></td>
                        <td><img src="<?php echo $banner['bannner_image'];?>" style="height:100px;width:auto;"/></td>
                        <td>
                          <?php if($banner['status']=='active'): ?>
                                 <a class="btn btn-<?php echo 'success'; ?>" href="<?php echo base_url('admin/activate_banner/'.$banner['id']);?>"> <i class="fa fa-thumbs-up"></i> </a>
                          <?php else: ?>
                                 <a class="btn btn-<?php echo 'danger'; ?>" href="<?php echo base_url('admin/activate_banner/'.$banner['id']);?>"> <i class="fa fa-thumbs-down"></i></a>
                          <?php endif; ?>
                        </td>
                        <td><a class="btn btn-danger" href="<?php echo base_url('admin/delete_banner/'.$banner['id']);?>"><i class="fa fa-trash"></i> DELETE </a></td>
                  </tr>
                    <?php endforeach;?>
                  </tbody>
               <?php endif;?>   
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>
