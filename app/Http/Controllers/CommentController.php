<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function getXoa($id, $idTT){
        $comment = Comment::find($id);
        $comment->delete();

        return redirect('admin/tintuc/sua/' . $idTT)->with('thongbao', 'Xóa Comment thành công');
    }
}
