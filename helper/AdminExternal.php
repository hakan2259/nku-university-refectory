<?php


class AdminExternal extends Model
{

    public $result, $user_management, $menu_management, $refectory_info_management,
        $design_management, $admin_user_management, $system_management, $system_maintenance, $sql_backup_management,$appointment_management;

    function __construct()
    {
        parent::__construct();

        $this->result = $this->db->listele("administrator", "where id=" . Session::get("adminId"));
        $this->user_management = $this->result[0]["user_management"];
        $this->menu_management = $this->result[0]["menu_management"];
        $this->refectory_info_management = $this->result[0]["refectory_info_management"];
        $this->design_management = $this->result[0]["design_management"];
        $this->admin_user_management = $this->result[0]["admin_user_management"];
        $this->system_management = $this->result[0]["system_management"];
        $this->system_maintenance = $this->result[0]["system_maintenance"];
        $this->sql_backup_management = $this->result[0]["sql_backup_management"];
        $this->appointment_management = $this->result[0]["appointment_management"];
    }

    function MenuControl()
    {
        if ($this->user_management == 1):
            ?>
            <li><a href="<?php echo URL; ?>/admin/users"><i class="fa fa-users" style="font-size: 20px"></i> Kullanıcı
                    Yönetimi </a>

            </li>
        <?php
        endif;

        if ($this->appointment_management == 1):
            ?>
            <li><a><i class="fa fa-calendar-o mr-2" style="font-size: 20px"></i> Randevu Yönetimi <span class="fa
                    fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="<?php echo URL; ?>/admin/appointment"> Randevular</a></li>
                    <li><a href="<?php echo URL; ?>/admin/appointmentDetailedSearch"> Detaylı Arama</a></li>
                </ul>
            </li>

        <?php
        endif;

        if ($this->menu_management == 1):
            ?>
            <li><a><i class="fas fa-cloud-meatball mr-2" style="font-size: 20px"></i> Menü Yönetimi <span class="fa
                    fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="<?php echo URL; ?>/admin/menus"> Menüler</a></li>
                    <li><a href="<?php echo URL; ?>/admin/refectories"> Yemekhaneler</a></li>
                </ul>
            </li>
        <?php
        endif;

        if ($this->refectory_info_management == 1):
            ?>
            <li><a href="<?php echo URL; ?>/admin/refectoryInfo"><i class="fa fa-info" style="font-size: 20px"></i>
                    Yemekhane Önemli Bilgiler </a>

            </li>
        <?php
        endif;

        if ($this->design_management == 1):
            ?>
            <li><a><i class="fas fa-cloud-meatball mr-2" style="font-size: 20px"></i> Tasarım Yönetimi <span class="fa
                    fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="<?php echo URL; ?>/admin/sliders"> Slider Yönetimi</a></li>
                    <li><a href="<?php echo URL; ?>/admin/colorManagement"> Tema Renk Yönetimi</a></li>
                </ul>
            </li>
        <?php
        endif;

        if ($this->admin_user_management == 1):
            ?>
            <li><a href="<?php echo URL; ?>/admin/adminUserManagement"><i class="fas fa-user-shield mr-2"
                                                                          style="font-size: 20px;"></i> Admin Kullanıcı
                    Yönetimi </a>

            </li>
        <?php
        endif;

        if ($this->system_management == 1):
            ?>
            <li><a><i class="fas fa-assistive-listening-systems mr-2" style="font-size: 20px"></i> Sistem Yönetimi <span
                            class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="<?php echo URL; ?>/admin/systemSettings"> Sistem Ayarları </a></li>
                    <li><a href="<?php echo URL; ?>/admin/Contact"> İletişim</a></li>
                </ul>
            </li>
        <?php
        endif;

        if ($this->system_maintenance == 1):
            ?>

            <li><a href="<?php echo URL; ?>/admin/systemMaintenance"><i class="fas fa-tools mr-2"
                                                                        style="font-size: 20px"></i> Sistem Bakım </a>

            </li>
        <?php
        endif;

        if ($this->sql_backup_management == 1):
            ?>

            <li><a href="<?php echo URL; ?>/admin/sqlBackup"><i class="fas fa-database mr-2"
                                                                        style="font-size: 20px"></i> Sql Yedek Al </a>

            </li>
        <?php
        endif;


    }  //Admin Menü Control


    function LookAtYourAuthority($field)
    {
        if ($this->$field != 1):
            header("Location:" . URL . "/admin/panel");
            exit();
        endif;
    }

    function GetSingleData($tableName)
    {
        return $this->db->listele($tableName);
    }

    function Verial($tabloisim,$kosul) {

        return $this->db->listele($tabloisim,$kosul);

    }
    function joinislemi($requrestedData,$tables,$condition){
        return $this->db->JoinProcess($requrestedData,$tables,$condition);
    }
}