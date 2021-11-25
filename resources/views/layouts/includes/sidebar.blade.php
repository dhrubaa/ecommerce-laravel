<nav class="active" id="sidebar">
     <ui class="list-unstyled lead">

        <li> 
            <a href=""><i class="fa fa-home fa-lg"></i> Home </a>
        </li>
        <li> 
            <a href="{{ route('orders.index') }}"><i class="fa fa-box fa-lg"> </i> Orders</a>
        </li>
        <li> 
        <a href="{{ route('transactions.index') }}"><i class="fa fa-money-bill fa-lg"> </i>Transactions</a>
        </li>
        <li> 
        <a href="{{ route('products.index') }}"><i class="fa fa-truck fa-lg"></i>Products</a>
        </li>    

    </ui>
</nav>

            <style>
            #sidebar.ui.lead{
                border-bottom: 1px solid #008B8B;;
                width: fit-content;
            }
            #sidebar ul li a{
                padding: 10px;
                font-size: 1.1em;
                display: block;
                width: 30vh;
                color: #008B8B;
            }

            #sidebar ul li a:hover{
                
                background: #008B8B;
                color: #fff;
                text-decoration: none !important;
            }
            #sidebar.ui.li a i{
                margin-right: 10px;
            }
            #sidebar ul.li.active>a,a[aria-expanded="true "]{
                color: #fff;
                background:#008B8B;
            }
            </style>