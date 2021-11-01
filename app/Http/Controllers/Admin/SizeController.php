<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Size;

class SizeController extends Controller
{
    public function addSize(Request $request){
        $output = '';
        if((double)$request->number_size > 0){
            $size = Size::create(['Number'=>$request->number_size]);
            $output = '<tr id="del-'.$size->id.'">
                <td class="text-center" id="size-'.$size->id.'">'.$size->Number.'</td>
                <td class="text-right">
                    <div class="dropdown dropdown-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item edit-size" href="#" data-toggle="modal" data-id="'.$size->id.'"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                            <a class="dropdown-item delete-size" href="#" data-toggle="modal" data-id="'.$size->id.'"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                        </div>
                    </div>
                </td>
            </tr>';
            return ['output'=>$output];
        }else{
            $output = 'Vui lòng nhập đúng định dạng';
            return ['error'=>$output];
        }
    }

    public function editSize(Request $request,$id){
        Size::where('SizeID',$id)->update(['Number'=>(double)$request->get('size')]);
       return ['output'=>'Sửa thành công'];
    }

    public function deleteSize(Request $request,$id){
        Size::where('SizeID',$id)->delete();
        return ['output'=>'xóa thành công'];
    }
}
