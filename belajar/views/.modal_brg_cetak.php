<div id="cetakpdf" class="modal fade" role="dialog">
    <div class="modal-dialog">
        
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Cetak PDF Data Barang</h4>
        </div>
        <div class="modal-body">
        <form action="./report/cetak_barang.php" method="post" target="_blank">
            <table>
                <tr>
                    <td>
                        <div class="form-group">
                            Dari Tanggal
                        </div>
                    </td>
                    <td align="center" width="5%">
                        <div class="form-group">:</div>
                    </td>
                    <td>
                        <div class="form-group" >
                            <input type="date" name="tgla" class="form-control" required>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="form-group">Sampai Tanggal</div>
                    </td>
                    <td>
                        <div class="form-group"> :</div>
                    </td>
                    <td>
                        <div class="form-group">
                            <input type="date" name="tglb" class="form-control" required>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <div class="form-group">
                            <input class="btn btn-primary btn-sm" type="submit" name="cetak_barang" value="Cetak">
                        </div>
                    </td>
                </tr>
            </table>
            </form>
        </div>

        <div class="modal-footer">
        <a target="_blank" href="./report/cetak_barang.php" class="btn btn-primary btn-sm">Cetak Semua Barang</a>  
        </div>
    </div>
    </div>
</div>