<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Supplier</h3>
        <div class="pull-right">
            <a href="supplier/add" class="btn btn-primary btn-flat">
                <i class="fa fa-user-plus"></i>Create
            </a>
        </div>
    </div>
    <div class="box-body table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Supplier</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
					  <td>01</td>
                      <td>PT Sinar Jaya</td>
                      <td>Jakarta</td>
                      <td>0251-87771411</td>
                      <td>sinarjayagroup@gmail.com</td>
                    <td class="text-center" width="60px">
                        <a href="<?=site_url('user/edit/')?>" class="btn btn-primary btn-xs">
                            <i class="fa fa-pencil"></i>Update
                        </a>
                        <a href="<?=site_url('user/edit/')?>" class="btn btn-danger btn-xs">
                            <i class="fa fa-pencil"></i>Delete
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        
    </div>
</div>