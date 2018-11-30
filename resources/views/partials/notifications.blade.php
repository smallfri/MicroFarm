<li class='dropdown medium only-icon widget'>
    <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
        <i class='fa fa-bell-o'></i>
        <div class='label'>{{\Auth::user()->notifications->count()}}</div>
    </a>
    <ul class='dropdown-menu'>
        @foreach(\Auth::user()->notifications as $notification)
                <li>
                    <a href='#'>
                        <div class='widget-body'>

                            @if($notification->type == "App\Notifications\AddBank")
                            <div class='pull-left icon'>
                                <i class='fa fa-bank'></i>
                            </div>
                            <div class='pull-left text'>
                                A New Bank "{{$notification->data['bank_name']}}" is added by {{$notification->data['added_by']}}

                                <small class='text-muted'>{{$notification->created_at->diffForHumans()}}</small>
                            </div>
                            @endif


                            @if($notification->type == "App\Notifications\AddBankAccounts")
                            <div class='pull-left icon'>
                                <i class='fa fa-bank'></i>
                            </div>
                            <div class='pull-left text'>

                                A New Bank Account "{{$notification->data['bank_account_number']}}" is added for the  {{$notification->data['bank_name']}} Bank

                                <small class='text-muted'>{{$notification->created_at->diffForHumans()}}</small>
                            </div>
                            @endif

                            @if($notification->type == "App\Notifications\AddBankCompany")
                            <div class='pull-left icon'>
                                <i class='fa fa-bank'></i>
                            </div>
                            <div class='pull-left text'>

                                "{{$notification->data['bank_name']}}" Bank added amount of {{$notification->data['amount']}} to {{$notification->data['customer_name']}} Company on {{$notification->data['date']}}

                                <small class='text-muted'>{{$notification->created_at->diffForHumans()}}</small>
                            </div>
                            @endif

                            @if($notification->type == "App\Notifications\AddBankContacts")
                            <div class='pull-left icon'>
                                <i class='fa fa-bank'></i>
                            </div>
                            <div class='pull-left text'>

                                "{{$notification->data['bank_name']}}" Bank added a new Contact - "{{$notification->data['bank_contact_name']}}"

                                <small class='text-muted'>{{$notification->created_at->diffForHumans()}}</small>
                            </div>
                            @endif

                            @if($notification->type == "App\Notifications\AddCash")
                            <div class='pull-left icon'>
                                <i class='fa fa-money'></i>
                            </div>
                            <div class='pull-left text'>

                                "{{$notification->data['added_by']}}" added amount of
                                {{$notification->data['cash']}} to {{$notification->data['customer']}} Company

                                <small class='text-muted'>{{$notification->created_at->diffForHumans()}}</small>
                            </div>
                            @endif


                            @if($notification->type == "App\Notifications\AddCustomer")
                            <div class='pull-left icon'>
                                <i class='fa fa-users-o'></i>
                            </div>
                            <div class='pull-left text'>

                                {{$notification->data['added_by']}} added a new Company - {{$notification->data['customer_name']}}

                                <small class='text-muted'>{{$notification->created_at->diffForHumans()}}</small>
                            </div>
                            @endif

                            @if($notification->type == "App\Notifications\AddSupplier")
                            <div class='pull-left icon'>
                                <i class='fa fa-life-ring'></i>
                            </div>
                            <div class='pull-left text'>

                                {{$notification->data['added_by']}} added a new Supplier - {{$notification->data['supplier_name']}}

                                <small class='text-muted'>{{$notification->created_at->diffForHumans()}}</small>
                            </div>
                            @endif

                            @if($notification->type == "App\Notifications\AddSupplierBank")
                            <div class='pull-left icon'>
                                <i class='fa fa-bank'></i>
                            </div>
                            <div class='pull-left text'>

                                {{$notification->data['added_by']}} added a new Bank - {{$notification->data['bank_name']}} for the Supplier {{$notification->data['supplier_name']}}

                                <small class='text-muted'>{{$notification->created_at->diffForHumans()}}</small>
                            </div>
                            @endif


                            @if($notification->type == "App\Notifications\AddUser")
                            <div class='pull-left icon'>
                                <i class='fa fa-user'></i>
                            </div>
                            <div class='pull-left text'>

                                A new User - "{{$notification->data['user_name']}}" is added as a  {{$notification->data['user_role']}} by {{$notification->data['added_by']}}

                                <small class='text-muted'>{{$notification->created_at->diffForHumans()}}</small>
                            </div>
                            @endif

                            @if($notification->type == "App\Notifications\ChangeCBCommercial")
                            <div class='pull-left icon'>
                                <i class='fa fa-user'></i>
                            </div>
                            <div class='pull-left text'>

                                CB-Commercial User is Changed from {{$notification->data['old_commercial_user_name']}} to {{$notification->data['new_commercial_user_name']}} for Supplier - {{$notification->data['supplier_name']}} by {{$notification->data['changed_by']}}

                                <small class='text-muted'>{{$notification->created_at->diffForHumans()}}</small>
                            </div>
                            @endif

                            @if($notification->type == "App\Notifications\ChangeCBSales")
                            <div class='pull-left icon'>
                                <i class='fa fa-user'></i>
                            </div>
                            <div class='pull-left text'>

                                CB-Sales User is Changed from {{$notification->data['old_sales_user_name']}} to {{$notification->data['new_sales_user_name']}} for Company - {{$notification->data['customer_name']}} by {{$notification->data['changed_by']}}

                                <small class='text-muted'>{{$notification->created_at->diffForHumans()}}</small>
                            </div>
                            @endif

                            @if($notification->type == "App\Notifications\EditBankCPNJ")
                            <div class='pull-left icon'>
                                <i class='fa fa-bank'></i>
                            </div>
                            <div class='pull-left text'>

                                {{$notification->data['bank_name']}} Bank's CPNJ is changed by {{$notification->data['changed_by']}} from
                                {{$notification->data['old_cpnj']}} to {{$notification->data['new_cpnj']}}

                                <small class='text-muted'>{{$notification->created_at->diffForHumans()}}</small>
                            </div>
                            @endif

                            @if($notification->type == "App\Notifications\SupplierCustomer")
                            <div class='pull-left icon'>
                                <i class='fa fa-handshake-o'></i>
                            </div>
                            <div class='pull-left text'>

                                A New Relation of Company - "{{$notification->data['customer_name']}}" to Supplier - {{$notification->data['supplier_name']}} is added. 

                                <small class='text-muted'>{{$notification->created_at->diffForHumans()}}</small>
                            </div>
                            @endif

                            @if($notification->type == "App\Notifications\TransactionApproved")
                            <div class='pull-left icon'>
                                <i class='fa fa-money'></i>
                            </div>
                            <div class='pull-left text'>

                                Transaction ID - {{$notification->data['transaction_id']}} is approved by - {{$notification->data['approved_by']}} 

                                <small class='text-muted'>{{$notification->created_at->diffForHumans()}}</small>
                            </div>
                            @endif

                            @if($notification->type == "App\Notifications\TransactionCancelled")
                            <div class='pull-left icon'>
                                <i class='fa fa-money'></i>
                            </div>
                            <div class='pull-left text'>

                                Transaction ID - {{$notification->data['transaction_id']}} is cancelled by - {{$notification->data['cancelled_by']}} 

                                <small class='text-muted'>{{$notification->created_at->diffForHumans()}}</small>
                            </div>
                            @endif

                            @if($notification->type == "App\Notifications\UserStatus")
                            <div class='pull-left icon'>
                                <i class='fa fa-money'></i>
                            </div>
                            <div class='pull-left text'>

                                "{{$notification->data['user_name']}}'s" status changed to {{$notification->data['user_status']}} by {{$notification->data['changed_by']}} 

                                <small class='text-muted'>{{$notification->created_at->diffForHumans()}}</small>
                            </div>
                            @endif



                        </div>
                    </a>
                </li>
                <li class='divider'></li>
        @endforeach
        <li class='widget-footer'>
            <a href='#'>All notifications</a>
        </li>


    </ul>
</li>