<div class="col-lg-12 text-right">
<button type="button" id="editDetails" class="btn btn-sm waves-effect waves-light">
<i class="fa fa-pencil"></i>
</button>
</div>

<div class="row">
<div class="col-lg-12 col-xl-6">
        <div class="table-responsive">
            <table class="table m-0">
                <tbody>
                    <tr>
                        <th scope="row">First name</th>
                        <td>{{Auth::user()->first_name}}</td>
                        <!-- <td><i class="fa fa-eye"></i></td> -->
                    </tr>
                  
                    <tr>
                        <th scope="row">Contact number</th>
                        <td>{{ Auth::user()->mobile ? Auth::user()->mobile : 'NA' }}</td>
                        <!-- <td><i class="fa fa-eye-slash"></i></td> -->
                    </tr>
                    <tr>
                        <th scope="row">Postal address</th>
                        <td>{{Auth::user()->address ? Auth::user()->address : 'NA' }}</td>
                        <!-- <td><i class="fa fa-eye-slash"></i></td> -->
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- end of table col-lg-6 -->
    <div class="col-lg-12 col-xl-6">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row">Last name</th>
                        <td>{{Auth::user()->last_name ? Auth::user()->last_name : 'NA' }}</td>
                        <!-- <td><i class="fa fa-eye-slash"></i></td> -->
                    </tr>
                    <tr>
                        <th scope="row">E-mail</th>
                        <td>{{Auth::user()->email}}</td>
                        <!-- <td><i class="fa fa-eye-slash"></i></td> -->
                    </tr>
                    <tr>
                        <th scope="row">website</th>
                        <td><a target="_blank" href="{{Auth::user()->profile->website}}"></a>{{Auth::user()->profile->website ? Auth::user()->profile->website : 'NA' }}</td>
                    </tr>
                   
                </tbody>
            </table>
        </div>
    </div>
</div>