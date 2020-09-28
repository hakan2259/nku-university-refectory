<?php require 'views/admin/header.php';

?>

    <!-- page content -->
    <div class="right_col" role="main">
        <!-- top tiles -->
        <div class="row" style="display: inline-block;" >
            <div class="tile_count">
                <div class="col-lg-12 col-md-12 col-sm-12  tile_stats_count">
                    <h6 class="count_top"><i class="fa fa-user"></i> Total User</h6>
                    <div class="count"><?php echo count($AdminExternal->GetSingleData("users")); ?></div>

                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h6 class="count_top"> <b>Not</b> : Otomasyonumuzda Önbellek(Cache) Sistemi Bulunmaktadır. Yapıcağınız Herhangi Bir Değişiklik 5 Dakika Sonra Uygulanacaktır! </h6>
                    <hr>
                    <h5>Web Sitemizin Neden Ön Belleğe İhtiyacı Var?</h5>
                    <h6>Önbelleğe alınmadan dinamik bir web sitesi çok sayıda ziyaretçiyi işleyemez. Bir ziyaretçi dinamik bir web sitesine erişirse, tüm veritabanı sorguları ve PHP komut dosyası yürütmeleri RAM belleği ve CPU gücü kullanır. Tüm sunucu kaynakları sınırlı olduğundan, web sunucunuz ve web siteniz yavaşlar veya kullanılamaz hale gelir.</h6>

                </div>

            </div>
        </div>
        <!-- /top tiles -->



    </div>
    <!-- /page content -->
<?php require 'views/admin/footer.php'; ?>