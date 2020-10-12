@extends('layout.master')
@section('title')
    Hợp đồng
@stop
@section('content')
    <div id="content">

        <table class="table table-bordered table-striped">
            <thead>
            <tr style="background-color: #ffc107">
                <th style="text-align: center; ">STT</th>
                <th style="text-align: center; ">Mã hợp đồng</th>
                <th style="text-align: center;">Khách hàng</th>

                <th style="text-align: center; ">Ngày ký</th>

                <th style="text-align: center; ">Chức năng</th>
            </tr>
            </thead>
            <tbody id="contract_body">
            <?php foreach ($contracts as $cus) { ?>
            <tr>
                <td><?php echo $cus->id ?></td>
                <td><?php echo $cus->code ?></td>

                <td><?php echo $cus->name ?></td>
                <td><?php echo date('d-m-Y', strtotime($cus->date_create)) ?></td>
                <td>
                    <a href="<?php echo url('admin/contract/' . $cus->id . '/show') ?>"
                       class="btn btn-xs btn-info"><?php echo __('general.view') ?></a>
                    <a href="<?php echo url('admin/contract/' . $cus->id . '/edit') ?>"
                       class="btn btn-xs btn-success"><?php echo __('general.edit') ?></a>
                    <form style="display: inline-block"
                          action="<?php echo url('admin/contract/' . $cus->id . '/destroy') ?>"
                          method="post" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                        <input type="hidden" name="_token" value="bhdkbadkcbksdcbk"/>
                        <button type="submit"
                                class="btn btn-xs btn-danger"><?php echo __('general.delete') ?>
                        </button>
                    </form>

                </td>

            </tr>
            <?php } ?>
            </tbody>
        </table>

        <div class="text-right" id="page">
            <?php echo($contracts->links()) ?>
        </div>
    </div>
@stop
