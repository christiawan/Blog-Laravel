@extends('Admin.Includes.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <nav class="pull-left">
                    <h4 class="title">Portfolio</h4>
                    <p class="category">Untuk Posting Portfolio ...</p>
                </nav>
                <nav class="pull-right">
                    {!! link_to_route('portfolio.create', 'Tambah Portfolio',$parameters = array() , array('class'=>'btn btn-primary btn-block')); !!}
                </nav>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-hover table-striped">
                    <thead>
                        <th width="1%" >No</th>
                        <th width="30%" >Title</th>
                        <th width="50%" >Article</th>
                        <th width="20%" >Action</th>
                    </thead>
                      <?php $x = 1; ?>
                    <tbody>
                        @foreach($portfolio as $data)
                          {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('portfolio.destroy', $data->id))) !!}
                        <tr>
                            <td>{{$x++}}</td>
                            <td>{{substr($data->title, 0,50)}}</td>
                            <td>{!! substr($data->article, 0,160) !!}</td>
                            <td>
                                <a href="{{ url('portfolio') }}/{{ $data->id }}" class="btn" >
                                    <i class="pe-7s-look " style="font-size: 20px; color:#4AA3DF;"></i>
                                </a>
                                <a href="{{ url('portfolio') }}/{{ $data->id }}/edit" class="btn" >
                                    <i class="pe-7s-pen " style="font-size: 20px; color:#2CC36B;"></i>
                                </a>
                                {!! Form::submit("Del", array('class' => 'btn')) !!}
                            </td>
                        </tr>
                        {!! Form::close() !!}
                        @endforeach
                    </tbody>
                </table>
                <nav class="pull-right">
                  {!! $portfolio->links() !!}
                </nav>
            </div>
        </div>
    </div>
@stop
