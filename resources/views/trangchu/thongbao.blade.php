
@extends('trangchu.layout.index')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">

            @foreach($baiviet as $bv)
            <div class="modal fade" id="Detail-Model-{{$bv->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-black" id="exampleModalLabel">{{$bv->tieu_de}}</h5><br>
                            <span class="modal-title text-primary push-right">Ngày đăng: {{date('d-m-Y', strtotime($bv->created_at))}}</span>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {!! $bv->noi_dung !!}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="card border-warning mb-3" >
                <div class="card-header bg-warning" style="color: #ffffff"><i class="fa fa-bullhorn"></i> Thông báo</div>
                <div class="card-body">
                    <table class="table table-striped table-hover text-dark">
                        <tbody>
                        @foreach($baiviet as $bv)
                        <tr>
                            <td style="cursor: pointer" data-toggle="modal" data-target="#Detail-Model-{{$bv->id}}">
                                <span class="text-black">{{$bv->tieu_de}}</span><br>
                                <span class="text-sm text-primary"> Ngày đăng: {{date('d-m-Y', strtotime($bv->created_at))}}</span>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <div class="col-sm-6">
            <div id="slider" class="carousel slide" data-ride="carousel">

                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <li data-target="#slider" data-slide-to="0" class="active"></li>
                    <li data-target="#slider" data-slide-to="1"></li>
                    <li data-target="#slider" data-slide-to="2"></li>
                </ul>

                <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="admin_asset/12.png" alt="Los Angeles" style="max-width: 350px;min-width: 250px">
                    </div>
                    <div class="carousel-item">
                        <img src="http://thegioibantin.com/wp-content/uploads/2013/11/huyhieudoanchinhthuc.jpg" alt="Chicago" style="max-width: 350px;min-width: 250px">
                    </div>
                    <div class="carousel-item">
                        <img src="admin_asset/12.png" alt="New York" style="max-width: 350px;min-width: 250px">
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#slider" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#slider" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>

            </div>
        </div>
    </div>
</div>
@endsection