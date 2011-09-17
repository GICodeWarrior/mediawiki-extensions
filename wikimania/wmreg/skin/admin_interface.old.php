<?php
/* Prevent hacking */
if ( !defined( 'TC_STARTED' ) )
{ die( 'Hacking Attempt' ); }

include_once 'includes/language_zh-hant.php';

global $myself_url, $register_data, $table_data, $lang_countries, $error_message, $lang_register_form;

function get_percentage( $number ) {
	global $register_data;
	if ( $register_data['total_people'] == 0 )  return '0.0%';
	else return number_format( $number / $register_data['total_people'] * 100, 1 ) . '%';
}
/* Fix XSS */
$register_data = array_map( 'htmlspecialchars', $register_data );

$cloth_sizes = array( NULL, 'XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL' );

$parameters = $myself_url . 'index.php?action=admin';
$parameters2 = $myself_url . 'index.php?action=admin';
if ( $MY_REQUEST['page'] )
{ $parameters .= '&page=' . urlencode( $MY_REQUEST['page'] ); }

if ( $MY_REQUEST['keyword'] )
{
	$parameters .= '&keyword=' . urlencode( $MY_REQUEST['keyword'] ) . '&filter=' . urlencode( $MY_REQUEST['filter'] );
	$parameters2 .= '&keyword=' . urlencode( $MY_REQUEST['keyword'] ) . '&filter=' . urlencode( $MY_REQUEST['filter'] );
}
$parameters2 .= '&mode=' . urlencode( $MY_REQUEST['mode'] );

?>
	<script type="text/javascript" src="jquery-latest.pack.js"><!--//XHTML hack--></script>
	<script type="text/javascript">
	<!--

	$(document).ready(function(){
		for (i = 1; i <= 3; i++)
		 {if (document.getElementById("item"+i+"_radio").checked == true) {radiocheck(i); } }

	$('#admin_form2').addClass('popup');
	$('#cancel_button').removeClass('hide_item');
	$('#fill_data_col').removeClass('hide_item');
	$('.fill_data_link').removeClass('hide_item');

	});

	function confirm_warning()
	{
		return confirm('注意：一旦勾選接受或退回報名，報名的處理狀態將無法再度在此介面修正。\n並且，在您勾選的同時，會將報名結果寄發信件給報名者。\n請再次確定您的勾選資料是否正確。');
	}

	function warning2()
	{
		if (document.getElementById("item2_radio").checked == true)
		return confirm('注意：\n(1) 請確認該報名者是否有有選擇過參加8/2的議程；如果有的話請確認Hacking Days Extra與Citizen Journalism Unconference的參加有沒有勾選。若沒有勾選，可能需要確認報名者希望參與哪場活動。\n(2) 新加入的勾選住宿者將自動設定為「不在乎」房間類型；而取消住宿者也將取消喜好房間類型的設定，而再次勾選住宿並無法復原其喜好設定。\n\n請再度確定填寫的資料是否正確。是否確定執行？');
		else
		return confirm('請再度確定填寫的資料是否正確。是否確定執行？');

	}
	function fill_data(surname, given_name, unique_code, j1, he, cju, j3, j4, j5, n1, n2, n3, n4, n5, n6, tag/* now invaild */, vip_status)
	{

		$("#content_part, #admin_form3, #footer").fadeTo('slow', 0.5);
		$('#mask').show();
		$("#admin_form2").fadeIn('slow');

		for (i = 1; i <= 3; i++)
		 {if (document.getElementById("item"+i+"_radio").checked == true) {radiocheck(i); } }

		$("#surname").val(surname);
		$("#given_name").val(given_name);
		$("#u_code").val(unique_code);
		$("#tag").val(tag);

		if (j1)  $("#j1").attr("checked", "checked");
			else $("#j1").removeAttr("checked");
		if (he)  $("#he").attr("checked", "checked");
			else $("#he").removeAttr("checked");
		if (eval("cju"))  $("#cju").attr("checked", "checked");
			else $("#cju").removeAttr("checked");

		for (var i=3; i<=5; i++)
		{ if (eval("j"+i))  $("#j"+i).attr("checked", "checked");
			else $("#j"+i).removeAttr("checked");
		}
		for (var i=1; i<=6; i++)
		{ if (eval("n"+i)) $("#n"+i).attr("checked", "checked");
			else $("#n"+i).removeAttr("checked");
		}

		for (var i=0; i<=3; i++)
		{ if (vip_status == i) $("#vips"+i).attr("selected", "selected");
			else $("#vips"+i).removeAttr("selected");
		}
	}

	function radiocheck(num)
	{
		for (i = 1; i<= 3; i++)
		{
			if (i != num)
			$("#item"+i).removeClass();
			$("#item"+i+" > p").hide('fast');
		}
		$("#item"+num).addClass("checked_item");
		$("#item"+num+" > p").show();
	}

	function close_popup()
	{
		$('#mask').hide();
		$("#content_part, #admin_form3, #footer").fadeTo('slow', 1);
		$("#admin_form2").fadeOut('slow');
	}
	//-->
	</script>
	<div id="mask">&nbsp;</div>
	<div id="content_part">
	  <h1>管理介面</h1>
	  <p id="special_pages">登入為<strong> <?php echo $_SESSION['user_id']?></strong> |  <a href="<?php echo $myself_url . 'index.php?action=logout'?>" title="登出並離開管理介面">登出</a></p>
	<?php if ( !empty( $error_message ) )
	{
		echo '<div id="correction">' . "\n" . $error_message . "\n" . '</div>' . "\n";
	}
	?>
<h3>列表與統計資料</h3>

<?php if ( $register_data['total_keyword'] ) { ?>
<p>搜尋結果共找到 <strong><?php echo $register_data['total_keyword']?></strong> 筆資料。<a href="<?php echo $myself_url; ?>?action=admin" title="結束搜尋，顯示所有資料">清除搜尋結果</a>
<?php } else { ?>
<p>目前共有 <strong><?php echo $register_data['total_people']; ?> 人</strong>報名，<strong><?php echo $register_data['total_accommodation']; ?> 人</strong>需要安排住宿。</p>
<?php } ?>
<form action="<?php echo $myself_url . 'index.php'; ?>" method="GET">
	<div id="admin_navigation">
	<p id="search_form">
	<select name="filter">
		<option value="name" <?php if ( $MY_REQUEST['filter'] == 'name' ) echo 'selected="selected"'; ?>>姓名、維基帳號</option>
		<option value="organization" <?php if ( $MY_REQUEST['filter'] == 'organization' ) echo 'selected="selected"'; ?>>組織</option>
		<option value="email" <?php if ( $MY_REQUEST['filter'] == 'email' ) echo 'selected="selected"'; ?>>電子郵件</option>
		<option value="unique_code" <?php if ( $MY_REQUEST['filter'] == 'unique_code' ) echo 'selected="selected"'; ?>>識別碼</option>
		<option value="tag" <?php if ( $MY_REQUEST['filter'] == 'tag' ) echo 'selected="selected"'; ?>>標籤</option>
	</select>
	<input type="text" name="keyword" value="<?php echo stripslashes( htmlspecialchars( $MY_REQUEST['keyword'] ) ); ?>" />
	<input type="submit" value="查詢" />
	<input type="hidden" name="action" value="admin" />
	<input type="hidden" name="mode" value="<?php echo htmlspecialchars( $MY_REQUEST['mode'] ); ?>" />
	</p>
<p><a href="<?php echo $parameters?>" title="諸如生日、姓名與身分證資料的資訊">基本資料</a> | <a href="<?php echo $parameters?>&mode=topic" title="參加的日期、偏好的主題、飲食習慣與衣服尺寸">日期、主題、食衣住行</a> | <a href="<?php echo $parameters?>&mode=liveinfo" title="是否須安排住宿，偏好的房間大小">住宿資訊</a> | <a href="<?php echo $parameters?>&mode=visa" title="是否要籌備團隊安排簽證協助，與需求的內容">簽證需求</a> | <a href="<?php echo $parameters?>&mode=pay" title="是否已經付款，付了多少錢">付款狀態</a></p>
</div>
</form>
<p>
<?php
switch( $MY_REQUEST['mode'] )
{
	case NULL:
	echo '共來自 <strong>' . $register_data['total_countries'] . '</strong> 個國家 / ' .
	'<strong>' . $register_data['total_male'] . '</strong> 男 (' . get_percentage( $register_data['total_male'] ) . '）/ ' .
	'<strong>' . $register_data['total_female'] . '</strong> 女 (' . get_percentage( $register_data['total_female'] ) . '）/ ' .
	'<strong>' . $register_data['total_sex_other'] . '</strong> 其他 (' . get_percentage( $register_data['total_sex_other'] ) . '）/ ' .
	'<strong>' . $register_data['total_wikimedians'] . '</strong> 維基人 (' . get_percentage( $register_data['total_wikimedians'] ) . '）';
	break;

	case 'topic':
	for ( $i = 3; $i <= 5; $i++ )
		echo '8/' . $i . '：<strong>' . $register_data['total_day' . $i] . '</strong> 人 (' . get_percentage( $register_data['total_day' . $i] ) . ') / ';
	for ( $i = 1; $i <= 3; $i++ )
		echo '' . $i . ' 天：<strong>' . $register_data['total_' . $i . 'days'] . '</strong> 人 (' . get_percentage( $register_data['total_' . $i . 'days'] ) . ') / ';
	break;

	case 'liveinfo':
	for ( $i = 1; $i <= 6; $i++ )
		echo $i . ' 天：<strong>' . $register_data['total_' . $i . 'nights'] . '</strong> 人 (' . get_percentage( $register_data['total_' . $i . 'nights'] ) . ') / ';
	break;

	case 'visa':
	echo '共 <strong>' . $register_data['total_assist'] . '</strong> 人 (' . get_percentage( $register_data['total_assist'] ) . ') 需要簽證協助';
	break;
}
?></p>
<form action="<?php echo $myself_url . 'index.php'; ?>" method="POST" onsubmit="return confirm_warning();">
	<table id="admin_table">
	<tr>
		<th>核取</th>
		<th>編號</th><th>姓名</th><th>台籍</th>
		<th>姓別</th><th>註冊時間</th>
		<?php if ( $MY_REQUEST['mode'] ) { ?>
		<th>8/1</th>
		<th>8/2</th>
		<th>HE</th>
		<th>CJU</th>
		<th>8/3</th>
		<th>8/4</th>
		<th>8/5</th>
		<?php }
		switch( $MY_REQUEST['mode'] ) {
			case NULL:
			echo '<th>ID</th><th>國家</th>
		'/*<th>城市</th>*/ . '<th>生日</th><th>母語</th>
		<th>語言程度</th>
		<th>組織</th><th>維基用戶名</th><th>名稱顯示</th>';
			break;
		case 'topic':
			echo '<th>T1</th>
		<th>T2</th>
		<th>T3</th>
		<th>衣</th><th>食</th>
		<th>過敏</th>';
			break;
		case 'liveinfo':
			echo '<th>7/31</th>
		<th>8/1</th>
		<th>8/2</th>
		<th>8/3</th>
		<th>8/4</th>
		<th>8/5</th>
		<th>R2</th>
		<th>R4</th>
		<th>R6</th>
		<th>DC</th>
		<th>應繳金額</th>
';
		break;
		case 'visa':
		echo '<th>簽證需求</th><th>需求詳述</th>';
		break;
		case 'pay':
		echo '<th>Email</th><th>識別碼</th><th>付款方式</th><th>付款狀態</th><!--<th>PayPal OK</th>--><th>應繳金額</th><th>收到金額</th>';
		break;
		} ?>
		<th>折價券</th>
		<th>狀態</th>
		<th>標籤</th>
		<th id="fill_data_col">編輯資訊</th>
	</tr>
<?php foreach ( $table_data as $data ) {
/* I Hate XSS */
$data = array_map( 'htmlspecialchars', $data );
?>
	<tr>
		<td><input type="checkbox" name="no[]" value=<?php echo $data['no']; ?> /></td>
		<td><?php echo $data['no']; ?></td>
		<td><?php echo $data['given_name'] . ' ' . $data['surname']; ?></td>
		<td><?php if ( $data['egy'] ) echo '是'; else echo '否'; ?></td>
		<td><?php
		switch( $data['sex'] )
		{
			case 1: echo '男'; break;
			case 2: echo '女'; break;
			case 3: echo $data['custom_sex']; break;
		}
		?></td><td><?php echo $data['signuptime']; ?></td>
		<?php if ( $MY_REQUEST['mode'] ) { ?>
		<td class="group1"><?php if ( $data['join1'] ) echo '●'; ?></td>
		<td class="group1"><?php if ( $data['join2'] ) echo '●'; ?></td>
		<td class="group1"><?php if ( $data['hacking'] ) echo '●'; ?></td>
		<td class="group1"><?php if ( $data['citizen'] ) echo '●'; ?></td>
		<td class="group1"><?php if ( $data['join3'] ) echo '●'; ?></td>
		<td class="group1"><?php if ( $data['join4'] ) echo '●'; ?></td>
		<td class="group1"><?php if ( $data['join5'] ) echo '●'; ?></td>
		<?php
		}
		switch( $MY_REQUEST['mode'] ) {
		case "":
		echo '<td>' . $data['id'] . '</td><td>' . $lang_countries[strtolower( $data['country'] )] . '</td>
		<td>'/*.$data['city'].'</td><td>'*/ . $data['birthday'] . '</td><td>' . $data['langn'] . '</td>
		<td>';
		if ( $data['lang1'] )
		echo $data['lang1'] . '-' . $data['lang1-level'] . '<br />';
		if ( $data['lang2'] )
		echo $data['lang2'] . '-' . $data['lang2-level'] . '<br />';
		if ( $data['lang3'] )
		echo $data['lang3'] . '-' . $data['lang3-level'] . '<br />';
		echo '</td><td>';
		echo $data['organization'];
		echo '</td><td>';
		if ( $data['wiki_id'] ) echo $data['wiki_id'] . '@' . $data['wiki_language'] . '.' . $data['wiki_project'];
		echo '</td><td>';

		foreach ( explode( ',', $data['showname'] ) as $key => $value )
		{
			echo $lang_register_form['showname' . $value];
			if ( $value == 4 )
			{ echo ': ' . $data['custom_showname']; }
			else
			{ echo ', '; }
		}
		echo '</td>';
		break;
		case "topic":?>
		<td class="group2"><?php if ( $data['topic1'] ) echo '●'; ?></td>
		<td class="group2"><?php if ( $data['topic2'] ) echo '●'; ?></td>
		<td class="group2"><?php if ( $data['topic3'] ) echo '●'; ?></td>
		<?php echo
		'<td>' . $cloth_sizes[$data['size']] . '</td>
		<td>';
		foreach ( explode( ',', $data['food'] ) as $key => $value )
		{
			echo $lang_register_form['food' . $value];
			if ( $value == 6 )
			{ echo ': ' . $data['food_other']; }
			else
			{ echo ', '; }
		}
		echo '</td><td>' . $data['allegric'] . '</td>';
		break;
		case "liveinfo":
		echo '<td class="group2">';
		if ( $data['night1'] && $data['room_num1'] ) echo $data['room_num1']; elseif ( $data['night1'] ) echo '●';
		echo '</td><td class="group2">';
		if ( $data['night2'] && $data['room_num2'] ) echo $data['room_num2']; elseif ( $data['night2'] ) echo '●';
		echo '</td><td class="group2">';
		if ( $data['night3'] && $data['room_num3'] ) echo $data['room_num3']; elseif ( $data['night3'] ) echo '●';
		echo '</td><td class="group2">';
		if ( $data['night4'] && $data['room_num4'] ) echo $data['room_num4']; elseif ( $data['night4'] ) echo '●';
		echo '</td><td class="group2">';
		if ( $data['night5'] && $data['room_num5'] ) echo $data['room_num5']; elseif ( $data['night5'] ) echo '●';
		echo '</td><td class="group2">';
		if ( $data['night6'] && $data['room_num6'] ) echo $data['room_num6']; elseif ( $data['night6'] ) echo '●';
		echo '</td><td class="group3">';
		if ( $data['room2'] ) echo '●';
		echo '</td><td class="group3">';
		if ( $data['room4'] ) echo '●';
		echo '</td><td class="group3">';
		if ( $data['room6'] ) echo '●';
		echo '</td><td class="group3">';
		if ( $data['room8'] ) echo '●';
		echo '</td>';
		echo '<td>' . $data['cost_total'] . '</td>';
		break;
		case 'visa':
		echo '<td>';
		if ( $data['visa_assistance'] ) echo '是'; else echo '否';
		echo '</td>
		<td>' . $data['visa_assistance_description'] . '</td>';
		break;
		case 'pay':
		echo '<td>' . $data['email'] . '</td>';
		echo '<td>' . $data['unique_code'] . '</td><td>';
		if ( $data['pay_method'] == 1 ) echo 'PayPal'; else echo '匯款';
		echo '</td><td>';
		if ( $data['cost_total'] > $data['cost_paid'] ) echo '不足';
		if ( $data['cost_total'] == 0 ) echo '免費';
		elseif ( $data['cost_total'] == $data['cost_paid'] ) echo '剛好付清';
		if ( $data['cost_total'] < $data['cost_paid'] ) echo '超過';
		// echo '</td><td>';
		// if ($data['paypal'] == 1) echo '完成'; else echo '未完成';
		echo '</td><td>' . $data['cost_total'];
		echo '</td><td>' . $data['cost_paid'] . '</td>';

	}
	echo '<td>';
	switch ( $data['vip_status'] )
	{
		case 1: echo '完全免費'; break;
		case 2: echo '一律維基人價'; break;
		case 3: echo '只有住宿費'; break;
	}
	echo '</td>';
	echo '<td>';
	switch ( $data['status'] )
	{
		case 0: echo '未受理'; break;
		case 1: echo '已接受'; break;
		case 2: echo '已拒絕'; break;
	}
	echo '</td><td>' . $data['tag'] . '</td><td>';
	echo '<a href="#" class="fill_data_link" onclick="fill_data(\'' . addslashes( $data['surname'] ) . '\',\'' . addslashes( $data['given_name'] ) . '\',\'' . $data['unique_code'] . '\',' . $data['join1'] . ',' . $data['hacking'] . ',' . $data['citizen'] . ',' . $data['join3'] . ',' . $data['join4'] . ',' . $data['join5'] . ',' . $data['night1'] . ',' . $data['night2'] . ',' . $data['night3'] . ',' . $data['night4'] . ',' . $data['night5'] . ',' . $data['night6'] . ',\'' . addslashes( $data['tag'] ) . '\',' . $data['vip_status'] . ')">編輯</a>';
	echo '</td>';
		?>
	</tr>
<?php } ?>
	</table>
	<p id="page">
	<?php
	if ( $MY_REQUEST['keyword'] )
	{ $total_page = ceil( $register_data['total_keyword'] / $register_data['per_page'] ); }
	else
	{ $total_page = ceil( $register_data['total_people'] / $register_data['per_page'] ); }

	if ( $register_data['page'] >= 5 )
	{ echo '<a href="' . $parameters2 . '&page=1" title="第 1 頁">1</a> '; }
	if ( $register_data['page'] >= 6 )
	{ echo '... '; }
	for ( $i = max( 1, $register_data['page'] - 3 ); ( $i < $register_data['page'] ); $i++ )
	{
		echo '<a href="' . $parameters2 . '&page=' . ( $i ) . '" title="第 ' . ( $i ) . ' 頁">' . ( $i ) . '</a> ';
	}
	echo '<strong>' . $register_data['page'] . '</strong> ';

	for ( $i = $register_data['page'] + 1; ( $i <= $total_page && $i <= $register_data['page'] + 3 ); $i++ )
	{
		echo '<a href="' . $parameters2 . '&page=' . ( $i ) . '" title="第 ' . ( $i ) . ' 頁">' . ( $i ) . '</a> ';
	}
	if ( $total_page - $register_data['page'] >= 5 )
	{ echo '... '; }

	if ( $total_page - $register_data['page'] >= 4 )
	{ echo '<a href="' . $parameters2 . '&page=' . $total_page . '" title="第 ' . $total_page . ' 頁">' . $total_page . '</a> '; }
	?>
	</p>

	<div id="admin_form1">
	<p>
	所核取的報名者：
	<input type="hidden" name="modification" value="change_status" />
	<input type="radio" name="status" value="1" id="accept" checked="checked" /><label for="accept"> 接受報名</label>
	<input type="radio" name="status" value="2" id="reject" /><label for="reject"> 退回報名</label>
	<input type="hidden" name="action" value="admin" />
	<input type="hidden" name="mode" value="<?php echo htmlspecialchars( $MY_REQUEST['mode'] ); ?>" />
	<input type="hidden" name="keyword" value="<?php echo htmlspecialchars( $MY_REQUEST['keyword'] ); ?>" />
	<input type="hidden" name="page" value="<?php echo htmlspecialchars( $MY_REQUEST['page'] ); ?>" />
	<input type="submit" value="確認" /> （接受報名只對已付完全款者有效）
	</p>	</div>
	</form>
	</div>
	<form action="<?php echo $myself_url; ?>index.php" method="POST" onsubmit="return warning2();">
	<div id="admin_form2">
	<h3>調整項目</h3>
	<p>名：<input type="text" name="given_name" id="given_name" />
	姓：<input type="text" name="surname" id="surname" />
	識別碼：<input type="text" name="unique_code" size="6" id="u_code" />
	</p>
	<div id="item1" class="checked_item">
	<input type="radio" name="item" value="1" checked="checked" id="item1_radio" onclick="radiocheck(1);" /><label for="item1_radio">收到付款登記</label>
	<p>收到金額：<input type="text" name="cost_paid" value="<?php if ( $MY_REQUEST['cost_paid'] != 0 ) echo htmlspecialchars( $MY_REQUEST['cost_paid'] ); ?>" size="5" />
	<input type="hidden" name="modification" value="add_paid" />
	<input type="hidden" name="action" value="admin" />
	<input type="hidden" name="mode" value="<?php echo htmlspecialchars( $MY_REQUEST['mode'] ); ?>" />
	<input type="hidden" name="keyword" value="<?php echo htmlspecialchars( $MY_REQUEST['keyword'] ); ?>" />
	<input type="hidden" name="filter" value="<?php echo htmlspecialchars( $MY_REQUEST['filter'] ); ?>" />
	<input type="hidden" name="page" value="<?php echo htmlspecialchars( $MY_REQUEST['page'] ); ?>" />

	（若輸入錯誤，可設定為負值以調整）
	</p>
	</div>
	<div id="item2">
	<input type="radio" name="item" value="2" id="item2_radio" onclick="radiocheck(2);" /><label for="item2_radio">日期與住宿資訊</label>
	<p>
	參加日期：
	<?php if ( $MY_REQUEST['j'] )
	{ echo '	    <input type="checkbox" value="1" name="j1" id="j1" checked="checked" />'; }
	else
	{ echo '	    <input type="checkbox" value="1" name="j1" id="j1" />'; }
	echo '<label for="j1">' . $lang_register_form['join1'] . '</label>' . "\n";

	// echo $lang_register_form['join2']; ?>
	  <input type="checkbox" name="he" value="1" id="he"<?php if ( $MY_REQUEST['he'] ) echo ' checked="checked"'; ?> /> <label for="he">Hacking Days Extra</label>
	  <input type="checkbox" name="cju" value="1" id="cju"<?php if ( $MY_REQUEST['cju'] ) echo ' checked="checked"'; ?> /> <label for="cju">Citizen Journalism Unconference</label>
	</p><p style="margin-left:  6em;">
<?php
for ( $i = 3; $i <= 5; $i++ )
{
	if ( $MY_REQUEST['j' . $i] )
	{ echo '	    <input type="checkbox" value="1" name="j' . $i . '" id="j' . $i . '" checked="checked" />'; }
	else
	{ echo '	    <input type="checkbox" value="1" name="j' . $i . '" id="j' . $i . '" />'; }
	echo '<label for="j' . $i . '">' . $lang_register_form['join' . $i] . '</label>';

	echo "\n";

}
?>
	</p>

	<p>
住宿：
	  <?php
for ( $i = 1; $i <= 6; $i++ )
{
	if ( $MY_REQUEST['n' . $i] )
	{ echo '	    <input type="checkbox" value="1" name="n' . $i . '" id="n' . $i . '" checked="checked" />'; }
	else
	{ echo '	    <input type="checkbox" value="1" name="n' . $i . '" id="n' . $i . '" />'; }
	echo '<label for="n' . $i . '">' . $lang_register_form['night' . $i] . '</label>';

	echo "\n";

}
?>

	</p>
	</div>
	<div id="item3">
	<input type="radio" name="item" value="3" id="item3_radio" onclick="radiocheck(3);" /><label for="item3_radio">編輯標籤與特殊身分</label>
	<p><label for="tag">標籤：</label><input type="text" name="tag" id="tag" />
	<label for="vip_status">特殊費用計算：</label><select name="vip_status" id="vip_status">
	<option value="0" id="vips0">不做特殊費用</option>
	<option value="1" id="vips1">完全免費</option>
	<option value="2" id="vips2">一律維基人價</option>
	<option value="3" id="vips3">只有住宿費</option>
	</select></p>
	</div>
	<p><input type="submit" value="確認" /><input type="button" value="取消" id="cancel_button" class="hide_item" onclick="close_popup()" /></p></div>
	</form>
	<div id="admin_form3">
	<form enctype="multipart/form-data" action="<?php echo $myself_url; ?>index.php" method="POST">
	<h3>資料上傳</h3>
	<p>上傳住宿資料：
	<input type="file" name="accommodation_file">
	<input type="hidden" name="modification" value="set_data" />
	<input type="hidden" name="action" value="admin" />
	<input type="submit" value="上傳" />
	</p>
	</form>

	<form action="<?php echo $myself_url; ?>index.php" method="POST">
	<h3>下載資料</h3>
	<p>
	<input type="hidden" name="modification" value="get_data" />
	<input type="hidden" name="action" value="admin" />
	<input type="submit" value="下載住宿資料庫" /> 格式為Tab分隔，UTF16-LE編碼的檔案，可匯入Micorosft Excel處理，處理完後存成Tab分隔檔案上傳即可。
	</p>
	</form>
	</div>
