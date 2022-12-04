<?php

namespace App\Admin\Controllers;

use App\Model\SevenseasSalePrice;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Grid\Filter;
use Encore\Admin\Show;

class SevenseasSalePriceController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'SevenseasSalePrice';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {

        $grid = new Grid(new SevenseasSalePrice());
        $grid->disableExport();
        $grid->filter(function(Filter $filter){
            $filter->disableIdFilter(); 
            $filter->column(1/2, function($filter) {
                $filter->like('owner', '拥有者');
                $filter->like('no', '编号');
                $filter->between('price', '价格');
            });

            $filter->column(1/2, function($filter) {
                $filter->in('level', '等级')->multipleSelect([
                    'T1' => 'T1',
                    'T2' => 'T2',
                    'T3' => 'T3',
                    'T4' => 'T4',
                    'T5' => 'T5',
                    'T6' => 'T6',
                    'T7' => 'T7',
                ]);
                $filter->between('price_time', '出价时间')->datetime();
            });
        });

        $grid->actions(function ($actions) {
            // 去掉删除
            $actions->disableDelete();    
            // 去掉编辑
            // $actions->disableEdit();       
            // 去掉查看
            // $actions->disableView();
        });
        

        $grid->column('id', __('ID'));
        $grid->column('no', __('编号'));
        $grid->column('level', __('等级'));
        $grid->column('coordinate', __('坐标'));
        $grid->column('distance', __('距离'));
        $grid->column('price', __('价格'));
        $grid->column('price_time', __('出价时间'));
        $grid->column('owner', __('拥有者'));
        $grid->column('created_at', __('创建时间'));
        $grid->column('updated_at', __('更新时间'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(SevenseasSalePrice::findOrFail($id));
        $show->panel()
            ->tools(function ($tools) {
                // $tools->disableEdit();
                // $tools->disableList();
                $tools->disableDelete();
            });
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new SevenseasSalePrice());
        $form->tools(function (Form\Tools $tools) {
            // 去掉`列表`按钮
            // $tools->disableList();
            // 去掉`删除`按钮
            $tools->disableDelete();
            // 去掉`查看`按钮
            // $tools->disableView();        
        });
        $form->saving(function (Form $form) {
            if ($form->isEditing()) {
                $form->updated_at = time();
            }
        });
        $form->hidden('id', 'ID');
        $form->text('seq_no', '批次');
        $form->select('level', '等级')->options([
            'T1' => 'T1',
            'T2' => 'T2',
            'T3' => 'T3',
            'T4' => 'T4',
            'T5' => 'T5',
            'T6' => 'T6',
            'T7' => 'T7',
        ]);
        $form->text('no', '编号');
        $form->text('coordinate', '坐标');
        $form->number('distance', '距离');
        $form->number('price', '价格');
        $form->datetime('price_time', '出价时间');
        $form->text('link', '详情链接');
        $form->text('owner', '拥有者');
        $form->text('owner_link', '拥有者链接');
        $form->text('level_img', '等级图片');
        $form->text('created_at', '创建时间')->readonly();
        $form->text('updated_at', '更新时间')->readonly();
        return $form;
    }
}
