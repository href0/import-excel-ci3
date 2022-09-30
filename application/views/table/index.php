<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <!-- <h3 class="card-title">DataTable with minimal features & hover style</h3> -->
                    <form action="<?= base_url('table/import_excel'); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Pilih File Excel</label>
                            <input type="file" name="fileExcel">
                        </div>
                        <div>
                            <button class='btn btn-success' type="submit">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                Import
                            </button>
                        </div>
                    </form>
                </div>

                <div class="card-body">
                    <table id="table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tag</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Koma</td>
                                <td>
                                    <?php foreach ($table as $row) {
                                        echo $row['tag'] . ', ';
                                    }; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Tagar</td>
                                <td>
                                    <?php foreach ($table as $row) {
                                        echo '#' . str_replace(' ', '', $row['tag']) . ' ';
                                    }; ?>
                                </td>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>