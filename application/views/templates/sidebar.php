<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= $user['name']; ?></p>
            </div>
        </div>
        <br>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <?php
            $role_id = $this->session->userdata('role_id');
            $queryMenu = "SELECT `user_menu`.`id`, `menu`
                          FROM `user_menu` JOIN `user_access_menu` 
                          ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                          WHERE `user_access_menu`.`role_id` = $role_id
                          ORDER BY `user_access_menu`.`menu_id` ASC
                         ";
            $menu = $this->db->query($queryMenu)->result_array();
            ?>
            <?php foreach ($menu as $m) : ?>
                <li class="header"><?= $m['menu']; ?></li>
                <!-- Query dari menu -->

                <!-- Sub Menu sesuai Menu -->
                <?php
                    $menuId = $m['id'];
                    $querySubMenu = "SELECT *
                                 FROM `user_sub_menu` JOIN `user_menu`
                                 ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                                 WHERE `user_sub_menu`.`menu_id` = $menuId
                                 AND `user_sub_menu`.`is_active` = 1
                    ";
                    $subMenu = $this->db->query($querySubMenu)->result_array();
                    ?>

                <?php foreach ($subMenu as $sm) : ?>
                    <?php if ($title2 == $sm['title']) : ?>
                        <li class="active">
                        <?php else : ?>
                        <li class="nav-item">
                        <?php endif; ?>
                        <a href="<?= base_url($sm['url']); ?>">
                            <i class="<?= $sm['icon']; ?>"></i> <span><?= $sm['title']; ?></span>
                        </a>
                    <?php endforeach; ?>
                        </li>
                    <?php endforeach; ?>
                    <br>
                    <li><a href="<?= base_url('auth/logout'); ?>"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->