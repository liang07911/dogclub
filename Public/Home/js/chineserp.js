$(document).ready(function(){

$('#province').change(function(){
	var cityVuleIndex = $('#province>option:selected').val();
	console.log(cityVuleIndex)
	var cityVule;

	if (cityVuleIndex==1) {
		cityVule = '<option value="3">东城</option><option value="4">西城</option><option value="5">朝阳</option><option value="6">丰台</option><option value="7">石景山</option><option value="8">海淀</option><option value="9">门头沟</option><option value="10">房山</option><option value="11">通州</option><option value="12">顺义</option><option value="13">昌平</option><option value="14">大兴</option><option value="15">平谷</option><option value="17">密云</option><option value="16">怀柔</option><option value="18">延庆</option>';
	}
	else if (cityVuleIndex==2) {
		cityVule = '<option value="3269">花地玛堂区</option><option value="3271">大堂区</option><option value="3270">圣安多尼堂区</option><option value="3273">风顺堂区</option><option value="3272">望德堂区</option><option value="3275">路环</option><option value="3274">氹仔</option>';
	}
	else if (cityVuleIndex==3) {
		cityVule = '<option value="21">河东</option><option value="20">和平</option><option value="23">南开</option><option value="22">河西</option><option value="25">红桥</option><option value="24">河北</option><option value="27">东丽</option><option value="26">滨海新区</option><option value="29">津南</option><option value="28">西青</option><option value="31">宁河</option><option value="30">北辰</option><option value="34">宝坻</option><option value="35">蓟县</option><option value="32">武清</option><option value="33">静海</option>';
	}
	else if (cityVuleIndex==4) {
		cityVule = '<option value="2740">昌都</option><option value="2731">拉萨</option><option value="2803">林芝</option><option value="2795">阿里</option><option value="2784">那曲</option><option value="2765">日喀则</option><option value="2752">山南</option>';
	}
	else if (cityVuleIndex==5) {
		cityVule = '<option value="37">石家庄</option><option value="61">唐山</option><option value="76">秦皇岛</option><option value="84">邯郸</option><option value="104">邢台</option><option value="124">保定</option><option value="150">张家口</option><option value="168">承德</option><option value="180">沧州</option><option value="197">廊坊</option><option value="208">衡水</option>';
	}
	else if (cityVuleIndex==6) {
		cityVule = '<option value="2234">临高</option><option value="2235">白沙</option><option value="2232">屯昌</option><option value="2233">澄迈</option><option value="2238">陵水</option><option value="2239">保亭</option><option value="2236">昌江</option><option value="2237">乐东</option><option value="2226">琼海</option><option value="2227">儋州</option><option value="2224">三沙</option><option value="2225">五指山</option><option value="2230">东方</option><option value="2231">定安</option><option value="2228">文昌</option><option value="2229">万宁</option><option value="2218">海口</option><option value="2223">三亚</option><option value="2240">琼中</option>';
	}
	else if (cityVuleIndex==7) {
		cityVule = '<option value="2812">西安</option><option value="2859">渭南</option><option value="2871">延安</option><option value="2831">宝鸡</option><option value="2826">铜川</option><option value="2844">咸阳</option><option value="2921">商洛</option><option value="2885">汉中</option><option value="2897">榆林</option><option value="2910">安康</option>';
	}
	else if (cityVuleIndex==8) {
		cityVule = '<option value="3226">台北市</option><option value="3227">高雄市</option><option value="3228">基隆市</option><option value="3229">台中市</option><option value="3230">台南市</option><option value="3231">新竹市</option><option value="3248">澎湖县</option><option value="3235">桃园县</option><option value="3234">宜兰县</option><option value="3233">台北县</option><option value="3232">嘉义市</option><option value="3239">彰化县</option><option value="3238">台中县</option><option value="3237">苗栗县</option><option value="3236">新竹县</option><option value="3243">台南县</option><option value="3242">嘉义县</option><option value="3241">云林县</option><option value="3240">南投县</option><option value="3247">花莲县</option><option value="3246">台东县</option><option value="3245">屏东县</option><option value="3244">高雄县</option>';
	}
	else if (cityVuleIndex==9) {
		cityVule = '<option value="1103">滁州</option><option value="1095">黄山</option><option value="1112">阜阳</option><option value="1135">亳州</option><option value="1127">六安</option><option value="1121">宿州</option><option value="1145">宣城</option><option value="1140">池州</option><option value="1032">合肥</option><option value="1051">蚌埠</option><option value="1042">芜湖</option><option value="1066">马鞍山</option><option value="1059">淮南</option><option value="1083">安庆</option><option value="1073">淮北</option><option value="1078">铜陵</option>';
	}
	else if (cityVuleIndex==10) {
		cityVule = ' <option value="2268">忠县</option><option value="2269">开县</option><option value="2270">云阳</option><option value="2271">奉节</option><option value="2264">城口</option><option value="2265">丰都</option><option value="2266">垫江</option><option value="2267">武隆</option><option value="2260">大足</option><option value="2261">荣昌</option><option value="2262">璧山</option><option value="2263">梁平</option><option value="2256">长寿</option><option value="2257">綦江</option><option value="2258">潼南</option><option value="2259">铜梁</option><option value="2253">双桥</option><option value="2252">万盛</option><option value="2255">巴南</option><option value="2254">渝北</option><option value="2249">南岸</option><option value="2248">九龙坡</option><option value="2251">两江新区</option><option value="2250">北碚</option><option value="2245">大渡口</option><option value="2244">渝中</option><option value="2247">沙坪坝</option><option value="2246">江北</option><option value="2243">涪陵</option><option value="2242">万州</option><option value="2282">南川</option><option value="2281">永川</option><option value="2280">合川</option><option value="2279">江津</option><option value="2278">彭水</option><option value="2277">酉阳</option><option value="2276">秀山</option><option value="2275">石柱</option><option value="2274">黔江</option><option value="2273">巫溪</option><option value="2272">巫山</option>';
	}
	else if (cityVuleIndex==11) {
		cityVule = '<option value="3265">大埔区</option><option value="3264">屯门区</option><option value="3267">元朗区</option><option value="3266">荃湾区</option><option value="3250">中西区</option><option value="3251">东区</option><option value="3254">南区</option><option value="3255">深水埗区</option><option value="3252">九龙城区</option><option value="3253">观塘区</option><option value="3258">油尖旺区</option><option value="3259">离岛区</option><option value="3256">黄大仙区</option><option value="3257">湾仔区</option><option value="3262">西贡区</option><option value="3263">沙田区</option><option value="3260">葵青区</option><option value="3261">北区</option>';
	}
	else if (cityVuleIndex==12) {
		cityVule = '<option value="609">辽源</option><option value="614">通化</option><option value="622">白山</option><option value="629">松原</option><option value="635">白城</option><option value="581">长春</option><option value="592">吉林</option><option value="602">四平</option><option value="641">延边</option>';
	}

	else if (cityVuleIndex==13) {
		cityVule = '<option value="2284">成都</option><option value="2435">阿坝</option><option value="2449">甘孜</option><option value="2468">凉山</option><option value="2304">自贡</option><option value="2311">攀枝花</option><option value="2317">泸州</option><option value="2325">德阳</option><option value="2332">绵阳</option><option value="2342">广元</option><option value="2350">遂宁</option><option value="2356">内江</option><option value="2362">乐山</option><option value="2374">南充</option><option value="2391">宜宾</option><option value="2384">眉山</option><option value="2402">广安</option><option value="2408">达州</option><option value="2416">雅安</option><option value="2430">资阳</option><option value="2425">巴中</option>';
	}
	else if (cityVuleIndex==14) {
		cityVule = '<option value="1249">南昌</option><option value="1259">景德镇</option><option value="1270">九江</option><option value="1264">萍乡</option><option value="1346">上饶</option><option value="1309">吉安</option><option value="1290">赣州</option><option value="1283">新余</option><option value="1286">鹰潭</option><option value="1334">抚州</option><option value="1323">宜春</option>';
	}
	else if (cityVuleIndex==15) {
		cityVule = '<option value="687">哈尔滨</option><option value="697">鹤岗</option><option value="651">鸡西</option><option value="670">齐齐哈尔</option><option value="743">佳木斯</option><option value="754">七台河</option><option value="759">牡丹江</option><option value="715">大庆</option><option value="706">双鸭山</option><option value="725">伊春</option><option value="788">大兴安岭</option><option value="770">黑河</option><option value="777">绥化</option>';
	}

	else if (cityVuleIndex==16) {
		cityVule = '<option value="2726">迪庆</option><option value="2721">怒江</option><option value="2715">德宏</option><option value="2702">大理</option><option value="2698">西双版纳</option><option value="2689">文山</option><option value="2610">玉溪</option><option value="2620">保山</option><option value="2600">曲靖</option><option value="2585">昆明</option><option value="2675">红河</option><option value="2664">楚雄</option><option value="2644">普洱</option><option value="2655">临沧</option><option value="2626">昭通</option><option value="2638">丽江</option>';
	}
	else if (cityVuleIndex==17) {
		cityVule = '<option value="2202">来宾</option><option value="2185">贺州</option><option value="2190">河池</option><option value="2209">崇左</option><option value="2107">柳州</option><option value="2094">南宁</option><option value="2136">梧州</option><option value="2118">桂林</option><option value="2165">玉林</option><option value="2172">百色</option><option value="2149">防城港</option><option value="2144">北海</option><option value="2159">贵港</option><option value="2154">钦州</option>';
	}
	else if (cityVuleIndex==18) {
		cityVule = ' <option value="1219">南平</option><option value="1230">龙岩</option><option value="1238">宁德</option><option value="1154">福州</option><option value="1168">厦门</option><option value="1175">莆田</option><option value="1181">三明</option><option value="1194">泉州</option><option value="1207">漳州</option>';
	}
	else if (cityVuleIndex==19) {
		cityVule = '<option value="221">太原</option><option value="232">大同</option><option value="250">长治</option><option value="244">阳泉</option><option value="278">晋中</option><option value="264">晋城</option><option value="271">朔州</option><option value="304">忻州</option><option value="319">临汾</option><option value="290">运城</option><option value="337">吕梁</option>';
	}
	else if (cityVuleIndex==20) {
		cityVule = '<option value="3101">固原</option><option value="3091">石嘴山</option><option value="3095">吴忠</option><option value="3084">银川</option><option value="3107">中卫</option>';
	}

	else if (cityVuleIndex==21) {
		cityVule = 'option value="1767">荆州</option><option value="1776">黄冈</option><option value="1787">咸宁</option><option value="1739">襄阳</option><option value="1749">鄂州</option><option value="1753">荆门</option><option value="1759">孝感</option><option value="1709">黄石</option><option value="1716">十堰</option><option value="1725">宜昌</option><option value="1695">武汉</option><option value="1810">神农架</option><option value="1809">天门</option><option value="1808">潜江</option><option value="1807">仙桃</option><option value="1798">恩施</option><option value="1794">随州</option>';
	}
	else if (cityVuleIndex==22) {
		cityVule = '<option value="3220">石河子</option><option value="3221">阿拉尔</option><option value="3222">图木舒克</option><option value="3223">五家渠</option><option value="3224">北屯</option><option value="3204">塔城</option><option value="3212">阿勒泰</option><option value="3166">克孜勒苏</option><option value="3156">阿克苏</option><option value="3146">巴音郭楞</option><option value="3142">博尔塔拉</option><option value="3193">伊犁</option><option value="3184">和田</option><option value="3171">喀什</option><option value="3130">哈密</option><option value="3134">昌吉</option><option value="3121">克拉玛依</option><option value="3126">吐鲁番</option><option value="3112">乌鲁木齐</option>';
	}
	else if (cityVuleIndex==23) {
		cityVule = '<option value="1371">青岛</option><option value="1360">济南</option><option value="1406">烟台</option><option value="1400">东营</option><option value="1393">枣庄</option><option value="1384">淄博</option><option value="1490">聊城</option><option value="1499">滨州</option><option value="1478">德州</option><option value="1507">菏泽</option><option value="1432">济宁</option><option value="1419">潍坊</option><option value="1457">日照</option><option value="1462">莱芜</option><option value="1465">临沂</option><option value="1445">泰安</option><option value="1452">威海</option>';
	}
	else if (cityVuleIndex==24) {
		cityVule = '<option value="826">无锡</option><option value="812">南京</option><option value="882">淮安</option><option value="891">盐城</option><option value="865">南通</option><option value="874">连云港</option><option value="855">苏州</option><option value="835">徐州</option><option value="847">常州</option><option value="923">宿迁</option><option value="916">泰州</option><option value="909">镇江</option><option value="901">扬州</option>';
	}
	else if (cityVuleIndex==25) {
		cityVule = '<option value="804">嘉定</option><option value="805">浦东新区</option><option value="806">金山</option><option value="807">松江</option><option value="800">虹口</option><option value="801">杨浦</option><option value="802">闵行</option><option value="803">宝山</option><option value="808">奉贤</option><option value="809">青浦</option><option value="810">崇明</option><option value="799">闸北</option><option value="798">普陀</option><option value="797">静安</option><option value="796">长宁</option><option value="795">徐汇</option><option value="794">卢湾</option><option value="793">黄浦</option>';
	}
	else if (cityVuleIndex==26) {
		cityVule = '<option value="2487">贵阳</option><option value="2503">遵义</option><option value="2498">六盘水</option><option value="2525">铜仁</option><option value="2518">安顺</option><option value="2536">黔西南</option><option value="2554">黔东南</option><option value="2545">毕节</option><option value="2571">黔南</option>';
	}
	else if (cityVuleIndex==27) {
		cityVule = '<option value="372">乌海</option><option value="376">赤峰</option><option value="352">呼和浩特</option><option value="362">包头</option><option value="407">呼伦贝尔</option><option value="398">鄂尔多斯</option><option value="389">通辽</option><option value="441">兴安</option><option value="429">乌兰察布</option><option value="421">巴彦淖尔</option><option value="461">阿拉善</option><option value="448">锡林郭勒</option>';
	}

	else if (cityVuleIndex==28) {
		cityVule = '<option value="1908">永州</option><option value="1896">郴州</option><option value="1889">益阳</option><option value="1884">张家界</option><option value="1874">常德</option><option value="1864">岳阳</option><option value="1851">邵阳</option><option value="1838">衡阳</option><option value="1832">湘潭</option><option value="1822">株洲</option><option value="1812">长沙</option><option value="1939">湘西</option><option value="1920">怀化</option><option value="1933">娄底</option>';
	}
	else if (cityVuleIndex==29) {
		cityVule = '<option value="3052">黄南</option><option value="3040">海东</option><option value="3047">海北</option><option value="3070">玉树</option><option value="3057">海南</option><option value="3063">果洛</option><option value="3032">西宁</option><option value="3077">海西</option>';
	}
	else if (cityVuleIndex==30) {
		cityVule = '<option value="956">温州</option><option value="944">宁波</option><option value="930">杭州</option><option value="1021">丽水</option><option value="1011">台州</option><option value="1006">舟山</option><option value="999">衢州</option><option value="989">金华</option><option value="976">湖州</option><option value="982">绍兴</option><option value="968">嘉兴</option>';
	}
	else if (cityVuleIndex==31) {
		cityVule = '<option value="1531">开封</option><option value="1518">郑州</option><option value="1636">南阳</option><option value="1660">信阳</option><option value="1650">商丘</option><option value="1609">濮阳</option><option value="1629">三门峡</option><option value="1616">许昌</option><option value="1623">漯河</option><option value="1579">鹤壁</option><option value="1569">安阳</option><option value="1598">焦作</option><option value="1585">新乡</option><option value="1542">洛阳</option><option value="1558">平顶山</option><option value="1671">周口</option><option value="1682">驻马店</option><option value="1693">济源</option>';
	}
	else if (cityVuleIndex==32) {
		cityVule = '<option value="466">沈阳</option><option value="507">本溪</option><option value="499">抚顺</option><option value="491">鞍山</option><option value="480">大连</option><option value="544">辽阳</option><option value="557">铁岭</option><option value="552">盘锦</option><option value="565">朝阳</option><option value="573">葫芦岛</option><option value="514">丹东</option><option value="521">锦州</option><option value="529">营口</option><option value="536">阜新</option>';
	}
	else if (cityVuleIndex==33) {
		cityVule = '<option value="2986">庆阳</option><option value="2978">酒泉</option><option value="3003">陇南</option><option value="2995">定西</option><option value="2958">武威</option><option value="2950">天水</option><option value="2944">白银</option><option value="2970">平凉</option><option value="2963">张掖</option><option value="3022">甘南</option><option value="3013">临夏</option><option value="2930">兰州市</option><option value="2939">嘉峪关</option><option value="2941">金昌</option>';
	}

	else if (cityVuleIndex==34) {
		cityVule = '<option value="2032">惠州</option><option value="2038">梅州</option><option value="2047">汕尾</option><option value="2016">茂名</option><option value="2023">肇庆</option><option value="2006">湛江</option><option value="1984">汕头</option><option value="1992">佛山</option><option value="1998">江门</option><option value="1973">深圳</option><option value="1980">珠海</option><option value="1962">韶关</option><option value="1949">广州</option><option value="2064">清远</option><option value="2073">东莞</option><option value="2075">中山</option><option value="2077">潮州</option><option value="2052">河源</option><option value="2059">阳江</option><option value="2081">揭阳</option><option value="2087">云浮</option>';
	}

	$('#city').html(cityVule);
})
})