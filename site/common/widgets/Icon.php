<?php
/**
 * Created by PhpStorm.
 * User: systom
 * Date: 2017/6/1
 * Time: 14:30
 */

namespace common\widgets;
use yii\widgets\InputWidget;
use yii\helpers\Html;

class Icon extends InputWidget
{

    static $is_load_js  = false;
    static $is_load_css = false;

    static public function loadJs($self){
        if(static::$is_load_js)return;
        $icon_array = ["glyphicon glyphicon-asterisk","glyphicon glyphicon-plus","glyphicon glyphicon-minus","glyphicon glyphicon-euro","glyphicon glyphicon-cloud","glyphicon glyphicon-envelope","glyphicon glyphicon-pencil","glyphicon glyphicon-glass","glyphicon glyphicon-music","glyphicon glyphicon-search","glyphicon glyphicon-heart","glyphicon glyphicon-star","glyphicon glyphicon-star-empty","glyphicon glyphicon-user","glyphicon glyphicon-film","glyphicon glyphicon-th-large","glyphicon glyphicon-th","glyphicon glyphicon-th-list","glyphicon glyphicon-ok","glyphicon glyphicon-remove","glyphicon glyphicon-zoom-in","glyphicon glyphicon-zoom-out","glyphicon glyphicon-off","glyphicon glyphicon-signal","glyphicon glyphicon-cog","glyphicon glyphicon-trash","glyphicon glyphicon-home","glyphicon glyphicon-file","glyphicon glyphicon-time","glyphicon glyphicon-road","glyphicon glyphicon-download-alt","glyphicon glyphicon-download","glyphicon glyphicon-upload","glyphicon glyphicon-inbox","glyphicon glyphicon-play-circle","glyphicon glyphicon-repeat","glyphicon glyphicon-refresh","glyphicon glyphicon-list-alt","glyphicon glyphicon-lock","glyphicon glyphicon-flag","glyphicon glyphicon-headphones","glyphicon glyphicon-volume-off","glyphicon glyphicon-volume-down","glyphicon glyphicon-volume-up","glyphicon glyphicon-qrcode","glyphicon glyphicon-barcode","glyphicon glyphicon-tag","glyphicon glyphicon-tags","glyphicon glyphicon-book","glyphicon glyphicon-bookmark","glyphicon glyphicon-print","glyphicon glyphicon-camera","glyphicon glyphicon-font","glyphicon glyphicon-bold","glyphicon glyphicon-italic","glyphicon glyphicon-text-height","glyphicon glyphicon-text-width","glyphicon glyphicon-align-left","glyphicon glyphicon-align-center","glyphicon glyphicon-align-right","glyphicon glyphicon-align-justify","glyphicon glyphicon-list","glyphicon glyphicon-indent-left","glyphicon glyphicon-indent-right","glyphicon glyphicon-facetime-video","glyphicon glyphicon-picture","glyphicon glyphicon-map-marker","glyphicon glyphicon-adjust","glyphicon glyphicon-tint","glyphicon glyphicon-edit","glyphicon glyphicon-share","glyphicon glyphicon-check","glyphicon glyphicon-move","glyphicon glyphicon-step-backward","glyphicon glyphicon-fast-backward","glyphicon glyphicon-backward","glyphicon glyphicon-play","glyphicon glyphicon-pause","glyphicon glyphicon-stop","glyphicon glyphicon-forward","glyphicon glyphicon-fast-forward","glyphicon glyphicon-step-forward","glyphicon glyphicon-eject","glyphicon glyphicon-chevron-left","glyphicon glyphicon-chevron-right","glyphicon glyphicon-plus-sign","glyphicon glyphicon-minus-sign","glyphicon glyphicon-remove-sign","glyphicon glyphicon-ok-sign","glyphicon glyphicon-question-sign","glyphicon glyphicon-info-sign","glyphicon glyphicon-screenshot","glyphicon glyphicon-remove-circle","glyphicon glyphicon-ok-circle","glyphicon glyphicon-ban-circle","glyphicon glyphicon-arrow-left","glyphicon glyphicon-arrow-right","glyphicon glyphicon-arrow-up","glyphicon glyphicon-arrow-down","glyphicon glyphicon-share-alt","glyphicon glyphicon-resize-full","glyphicon glyphicon-resize-small","glyphicon glyphicon-exclamation-sign","glyphicon glyphicon-gift","glyphicon glyphicon-leaf","glyphicon glyphicon-fire","glyphicon glyphicon-eye-open","glyphicon glyphicon-eye-close","glyphicon glyphicon-warning-sign","glyphicon glyphicon-plane","glyphicon glyphicon-calendar","glyphicon glyphicon-random","glyphicon glyphicon-comment","glyphicon glyphicon-magnet","glyphicon glyphicon-chevron-up","glyphicon glyphicon-chevron-down","glyphicon glyphicon-retweet","glyphicon glyphicon-shopping-cart","glyphicon glyphicon-folder-close","glyphicon glyphicon-folder-open","glyphicon glyphicon-resize-vertical","glyphicon glyphicon-resize-horizontal","glyphicon glyphicon-hdd","glyphicon glyphicon-bullhorn","glyphicon glyphicon-bell","glyphicon glyphicon-certificate","glyphicon glyphicon-thumbs-up","glyphicon glyphicon-thumbs-down","glyphicon glyphicon-hand-right","glyphicon glyphicon-hand-left","glyphicon glyphicon-hand-up","glyphicon glyphicon-hand-down","glyphicon glyphicon-circle-arrow-right","glyphicon glyphicon-circle-arrow-left","glyphicon glyphicon-circle-arrow-up","glyphicon glyphicon-circle-arrow-down","glyphicon glyphicon-globe","glyphicon glyphicon-wrench","glyphicon glyphicon-tasks","glyphicon glyphicon-filter","glyphicon glyphicon-briefcase","glyphicon glyphicon-fullscreen","glyphicon glyphicon-dashboard","glyphicon glyphicon-paperclip","glyphicon glyphicon-heart-empty","glyphicon glyphicon-link","glyphicon glyphicon-phone","glyphicon glyphicon-pushpin","glyphicon glyphicon-usd","glyphicon glyphicon-gbp","glyphicon glyphicon-sort","glyphicon glyphicon-sort-by-alphabet","glyphicon glyphicon-sort-by-alphabet-alt","glyphicon glyphicon-sort-by-order","glyphicon glyphicon-sort-by-order-alt","glyphicon glyphicon-sort-by-attributes","glyphicon glyphicon-sort-by-attributes-alt","glyphicon glyphicon-unchecked","glyphicon glyphicon-expand","glyphicon glyphicon-collapse-down","glyphicon glyphicon-collapse-up","glyphicon glyphicon-log-in","glyphicon glyphicon-flash","glyphicon glyphicon-log-out","glyphicon glyphicon-new-window","glyphicon glyphicon-record","glyphicon glyphicon-save","glyphicon glyphicon-open","glyphicon glyphicon-saved","glyphicon glyphicon-import","glyphicon glyphicon-export","glyphicon glyphicon-send","glyphicon glyphicon-floppy-disk","glyphicon glyphicon-floppy-saved","glyphicon glyphicon-floppy-remove","glyphicon glyphicon-floppy-save","glyphicon glyphicon-floppy-open","glyphicon glyphicon-credit-card","glyphicon glyphicon-transfer","glyphicon glyphicon-cutlery","glyphicon glyphicon-header","glyphicon glyphicon-compressed","glyphicon glyphicon-earphone","glyphicon glyphicon-phone-alt","glyphicon glyphicon-tower","glyphicon glyphicon-stats","glyphicon glyphicon-sd-video","glyphicon glyphicon-hd-video","glyphicon glyphicon-subtitles","glyphicon glyphicon-sound-stereo","glyphicon glyphicon-sound-dolby","glyphicon glyphicon-sound-5-1","glyphicon glyphicon-sound-6-1","glyphicon glyphicon-sound-7-1","glyphicon glyphicon-copyright-mark","glyphicon glyphicon-registration-mark","glyphicon glyphicon-cloud-download","glyphicon glyphicon-cloud-upload","glyphicon glyphicon-tree-conifer","glyphicon glyphicon-tree-deciduous"];
        $icon_string = '';
        foreach ($icon_array as $icon){
            $icon_string .= '<span class="'.$icon.'" data-icon-text="'.$icon.'"></span>';
        }
        $js = 'function openIcon(self){
            var html = \'\';
            layer.open({
                type: 1,
                area: [\'670px\', \'400px\'], //宽高
                title: \'图标库（双击即可选择该图标）\',
                content: \'<div class="icon-list">'.$icon_string.'</div>\',
                success: function(layero, index){
                    layero.find(\'.icon-list span\').on(\'dblclick\',function(){
                        var row = $(self).parent().parent();
                        row.find(\'[type="hidden"]\').val($(this).data(\'icon-text\'));
                        row.find(\'.info-box-icon i\').attr(\'class\',\'glyphicon \' + $(this).data(\'icon-text\'));
                        layer.close(index);
                    });
                }
            });
        }';
        $self->getView()->registerJs($js, \yii\web\View::POS_END);
        $self->getView()->registerJsFile('/plugins/layer/layer.js',['depends'=>'backend\assets\AppAsset','position'=>\yii\web\View::POS_END]);
        static::$is_load_js = true;
    }

    static public function loadCss($self){
        if(static::$is_load_css)return;
        $cssString = '
            .icon-list span{
                width: 50px;
                height: 50px;
                line-height: 50px;
                text-align: center;
                font-size: 30px;
                color: #777;
            }
            .icon-list span:hover{
                background:#ddd;
            }
        ';
        $self->getView()->registerCss($cssString);
        $self->getView()->registerCssFile('/plugins/layer/skin/default/layer.css',['depends'=>'backend\assets\AppAsset','position'=>\yii\web\View::POS_END]);
        static::$is_load_css = true;
    }

    public function init()
    {
        static::loadJs($this);
        static::loadCss($this);
        $icon = $this->field->model[$this->field->attribute];
        if(!$icon) $icon = 'glyphicon glyphicon-send';
        parent::init();
        echo '<div class="row" style="margin:0;">
            <div class="col-md-1" style="padding: 0px;">
                <span class="info-box-icon bg-aqua"><i class="'.$icon.'"></i></span>
            </div>
            '.Html::activeHiddenInput($this->field->model, $this->field->attribute,[]).'
            <div class="col-md-1" style="padding: 0px;">
                <a class="btn btn-default" href="#" onclick="openIcon(this)">选择</a>
            </div>
        </div>';
    }
}