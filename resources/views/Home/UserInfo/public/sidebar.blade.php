
<aside class="menu">
    <ul>
        <li class="person active">
            <a href="{{route('UserInfo')}}">个人中心</a>
        </li>
        <li class="person">
            <a href="#">个人资料</a>
            <ul>
                <li> <a href="{{route('information')}}">个人信息</a></li>
                <li> <a href="{{route('safety')}}">安全设置</a></li>
                <li> <a href="{{route('address')}}">收货地址</a></li>

            </ul>
        </li>
        <li class="person">
            <a href="#">我的交易</a>
            <ul>
                <li> <a href="{{route('order')}}">订单管理</a></li>
                <li> <a href="{{route('change')}}">退款售后</a></li>

            </ul>
        </li>
        <li class="person">
            <a href="#">我的资产</a>
            <ul>
                <li> <a href="{{route('coupon')}}">优惠券</a></li>
                <li> <a href="{{route('bonus')}}">红包</a></li>
                <li> <a href="{{route('bill')}}">账单明细</a></li>

            </ul>
        </li>

        <li class="person">
            <a href="#">我的小窝</a>
            <ul>
                <li> <a href="{{route('collection')}}">收藏</a></li>
                <li> <a href="{{route('foot')}}">足迹</a></li>
                <li> <a href="{{route('comment')}}">评价</a></li>
                <li> <a href="{{route('news')}}">消息</a></li>
            </ul>
        </li>

    </ul>

</aside>
