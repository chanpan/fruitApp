<?php
namespace app\modules\utils;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Noty
 *
 * @author damasac
 */
class Noty {
   public static function Confirm(){
       return"
            var n = new Noty({
            text: 'Do you want to continue? <span class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</span>',
            theme: 'bootstrap-v3',
            buttons: [
              Noty.button('YES', 'btn btn-success', function () {
                  console.log('button 1 clicked');
              }, {id: 'button1', 'data-status': 'ok'}),

              Noty.button('NO', 'btn btn-error', function () {
                  console.log('button 2 clicked');
                  n.close();
              })
            ]
          }).show();
       ";
   }
   
   public static function Success($message){
       return"
             new Noty({
                    type: 'success',
                    theme: 'bootstrap-v3',
                    layout: 'bottomRight',
                    text: '".$message." <span class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</span>'
             }).show();
       ";
   }
   public static function Error($message){
       return"
             new Noty({
                    type: 'error',
                    theme: 'bootstrap-v3',
                    layout: 'bottomRight',
                    text: '".$message." <span class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</span>'
             }).show();
       ";
   }
}
