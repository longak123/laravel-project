<?php 
    namespace App\Helpers;
    

    class Helper{
        public static function menu($menus, $parent_id=0, $char=''){

            $html = '';
            foreach($menus as $key=>$menu){
                if ($menu->parent_id == $parent_id) {
                    $html .= '
                    <tr>
                    <td> '.  $menu->id     .'</td>
                    <td> '. $char . $menu->name    .'</td>
                    <td> '. self::active($menu->active)    .'</td>
                    <td> '.  $menu->updated_at     .'</td>

                    <td>
                        <a class = "btn btn-primary" href="/admin/menus/edit/'. $menu->id .'">
                        Sửa danh mục
                        </a>
                        <a href="#"  class ="btn btn-danger" 
                            onclick = "removeRow('.  $menu->id .',\'/admin/menus/destroy\')">
                        Xóa danh mục
                        </a>
                    </td>
                    </tr>
                    
                    
                    ';

                    unset($menus[$key]);
                    $html .= self::menu($menus, $menu->id, $char .'--');
                }
            }
            return $html;
        }

        public static function active($active =0):string
        {
            return $active == 0 ? '<span>NO</span>':'<span>YES</span>';
        }
    }





?>