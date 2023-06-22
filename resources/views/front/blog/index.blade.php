@extends('front.layouts.doctor-dashboard')
@section('title','Blogs')
@section('content')
<div class="col-lg-8 col-md-12">
    <div class="create-blog">
        <div class="creat-blogs">
            <h2>My Blogs</h2>
            <a href="{{route('blog.create')}}">
                <button style="color: #FFFFFF; background: #6EC7C3;
                    border: 1px solid #6EC7C3;
                    border-radius: 6px; width: 130px; height: 40px; "> Add New Blog</button>
            </a>
        </div>

        <!-- Today Appointment Tab -->
        <div class="tab-pane" id="today-appointments">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-center mb-0">
                        <thead>
                            <tr>
                                <!-- <th>No</th> -->
                                <th>No</th>
                                <th>Blog Tiltle</th>
                                <th>Post Date</th>
                                <th>Comment</th>
                                <th>17 Saved</th>
                                <!-- <th class="text-center">Paid Amount</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <p class="fw-bold">1</p>
                                </td>
                                <td>
                                    <div class="taple-all">
                                        <img src="{{asset('front/img/about/creat-blog.png')}}">
                                        <p class="taple-para">
                                            10 Top Questions on Pulmonary Rehab..</p>
                                    </div>
                                </td>
                                <td>3. Jan .2023</td>
                                <td>16 Comment</td>
                                <td>17 Saved</td>
                                <td>
                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                        <i class="far fa-eye"></i> View
                                    </a>
                                </td>
                                <td>
                                    <a href="javascript:void(0);"
                                        class="btn btn-sm bg-success-light">
                                        <i class="fas fa-check"></i> Accept
                                    </a>
                                </td>
                                <td>
                                    <a href="javascript:void(0);"
                                        class="btn btn-sm bg-danger-light">
                                        <i class="fas fa-times"></i> Cancel
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="fw-bold">2</p>
                                </td>
                                <td>
                                    <div class="taple-all">
                                        <img src="./assets/img/about/creat-blog.png">
                                        <p class="taple-para">
                                            10 Top Questions on Pulmonary Rehab..</p>
                                    </div>
                                </td>
                                <td>3. Jan .2023</td>
                                <td>16 Comment</td>
                                <td>17 Saved</td>
                                <td>
                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                        <i class="far fa-eye"></i> View
                                    </a>
                                </td>
                                <td>
                                    <a href="javascript:void(0);"
                                        class="btn btn-sm bg-success-light">
                                        <i class="fas fa-check"></i> Accept
                                    </a>
                                </td>
                                <td>
                                    <a href="javascript:void(0);"
                                        class="btn btn-sm bg-danger-light">
                                        <i class="fas fa-times"></i> Cancel
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="fw-bold">3</p>
                                </td>
                                <td>
                                    <div class="taple-all">
                                        <img src="./assets/img/about/creat-blog.png">
                                        <p class="taple-para">
                                            10 Top Questions on Pulmonary Rehab..</p>
                                    </div>
                                </td>
                                <td>3. Jan .2023</td>
                                <td>16 Comment</td>
                                <td>17 Saved</td>
                                <td>
                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                        <i class="far fa-eye"></i> View
                                    </a>
                                </td>
                                <td>
                                    <a href="javascript:void(0);"
                                        class="btn btn-sm bg-success-light">
                                        <i class="fas fa-check"></i> Accept
                                    </a>
                                </td>
                                <td>
                                    <a href="javascript:void(0);"
                                        class="btn btn-sm bg-danger-light">
                                        <i class="fas fa-times"></i> Cancel
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="fw-bold">4</p>
                                </td>
                                <td>
                                    <div class="taple-all">
                                        <img src="./assets/img/about/creat-blog.png">
                                        <p class="taple-para">
                                            10 Top Questions on Pulmonary Rehab..</p>
                                    </div>
                                </td>
                                <td>3. Jan .2023</td>
                                <td>16 Comment</td>
                                <td>17 Saved</td>
                                <td>
                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                        <i class="far fa-eye"></i> View
                                    </a>
                                </td>
                                <td>
                                    <a href="javascript:void(0);"
                                        class="btn btn-sm bg-success-light">
                                        <i class="fas fa-check"></i> Accept
                                    </a>
                                </td>
                                <td>
                                    <a href="javascript:void(0);"
                                        class="btn btn-sm bg-danger-light">
                                        <i class="fas fa-times"></i> Cancel
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="fw-bold">5</p>
                                </td>
                                <td>
                                    <div class="taple-all">
                                        <img src="./assets/img/about/creat-blog.png">
                                        <p class="taple-para">
                                            10 Top Questions on Pulmonary Rehab..</p>
                                    </div>
                                </td>
                                <td>3. Jan .2023</td>
                                <td>16 Comment</td>
                                <td>17 Saved</td>
                                <td>
                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                        <i class="far fa-eye"></i> View
                                    </a>
                                </td>
                                <td>
                                    <a href="javascript:void(0);"
                                        class="btn btn-sm bg-success-light">
                                        <i class="fas fa-check"></i> Accept
                                    </a>
                                </td>
                                <td>
                                    <a href="javascript:void(0);"
                                        class="btn btn-sm bg-danger-light">
                                        <i class="fas fa-times"></i> Cancel
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="fw-bold">6</p>
                                </td>
                                <td>
                                    <div class="taple-all">
                                        <img src="./assets/img/about/creat-blog.png">
                                        <p class="taple-para">
                                            10 Top Questions on Pulmonary Rehab..</p>
                                    </div>
                                </td>
                                <td>3. Jan .2023</td>
                                <td>16 Comment</td>
                                <td>17 Saved</td>
                                <td>
                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                        <i class="far fa-eye"></i> View
                                    </a>
                                </td>
                                <td>
                                    <a href="javascript:void(0);"
                                        class="btn btn-sm bg-success-light">
                                        <i class="fas fa-check"></i> Accept
                                    </a>
                                </td>
                                <td>
                                    <a href="javascript:void(0);"
                                        class="btn btn-sm bg-danger-light">
                                        <i class="fas fa-times"></i> Cancel
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="fw-bold">7</p>
                                </td>
                                <td>
                                    <div class="taple-all">
                                        <img src="./assets/img/about/creat-blog.png">
                                        <p class="taple-para">
                                            10 Top Questions on Pulmonary Rehab..</p>
                                    </div>
                                </td>
                                <td>3. Jan .2023</td>
                                <td>16 Comment</td>
                                <td>17 Saved</td>
                                <td>
                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                        <i class="far fa-eye"></i> View
                                    </a>
                                </td>
                                <td>
                                    <a href="javascript:void(0);"
                                        class="btn btn-sm bg-success-light">
                                        <i class="fas fa-check"></i> Accept
                                    </a>
                                </td>
                                <td>
                                    <a href="javascript:void(0);"
                                        class="btn btn-sm bg-danger-light">
                                        <i class="fas fa-times"></i> Cancel
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /Today Appointment Tab -->
            </div>
        </div>
    </div>
</div>
@endsection