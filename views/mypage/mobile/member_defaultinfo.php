<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<div class="mt20 mypage">

    <section class="title02">
        <h2>회원 정보 수정</h2>
        <p><span>내 정보</span>를 수정 하실 수 있습니다.</p>
    </section>

    <section class="info_table">
        <table>
            <tr>
                <td class="active">
                    <a href="<?php echo site_url('mypage'); ?>">내 정보</a>
                </td>
                <td>
                    <a href="<?php echo site_url('mypage/post'); ?>">작성글</a>
                </td>
                <td>
                    <a href="<?php echo site_url('notification'); ?>">알&nbsp;&nbsp;림<span class="lab_notification badge notification_num"><?php echo number_format(element('notification_num', $layout) + 0); ?></span></a>
                </td> 
            </tr>
            <tr>
                <td>
                    <a href="<?php echo site_url('mypage/scrap'); ?>" title="스크랩">스크랩</a>
                </td>
                <td>
                    <a href="<?php echo site_url('note/lists/recv'); ?>" title="쪽지함">쪽지함<span class="lab_notification"><?php echo number_format((int) $this->member->item('meta_unread_note_num')); ?></span></a>
                </td>
                <td>
                    <a href="<?php echo site_url('mypage/followinglist'); ?>" title="팔로우">팔로우</a>
                </td>
            </tr>
        </table>
    </section>
    
    <section class="info_modify">
    <?php
    echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>');
    echo show_alert_message(element('message', $view), '<div class="alert alert-auto-close alert-dismissible alert-info"><button type="button" class="close alertclose" >&times;</button>', '</div>');
    echo show_alert_message($this->session->flashdata('message'), '<div class="alert alert-auto-close alert-dismissible alert-info"><button type="button" class="close alertclose" >&times;</button>', '</div>');
    ?>

    <div class="alert alert-dismissible alert-info">
        회원님은 소셜 계정을 통하여 로그인하셨습니다. <br />
        회원님의 아이디, 패스워드, 이메일, 닉네임 정보를 입력하시면, 앞으로는 소셜계정으로도 로그인을 계속 하실 수 있으며, 또한 입력하신 회원 아이디와 패스워드로도 이 홈페이지에 로그인이 가능해집니다. <br />
        또한 이 정보를 입력하신 후에 상세 개인정보 수정페이지에서 메일수신여부, 쪽지수신여부 등을 계속하여 설정하실 수 있습니다.
    </div>
    <?php
    $attributes = array('class' => 'form-horizontal', 'name' => 'fdefaultinfoform', 'id' => 'fdefaultinfoform');
    echo form_open_multipart(current_url(), $attributes);
    ?>
        <ol class="">
            <li>
                <span>회원아이디</span>
                <div class="form-text text-primary group"><input type="text" id="mem_userid" name="mem_userid" class="form-control input" minlength="3" />
                <p class="help-block">영문자, 숫자, _ 만 입력 가능. 최소 3자이상 입력하세요</p>
            </li>
            <li>
                <span>패스워드</span>
                <div class="form-text text-primary group"><input type="password" id="mem_password" name="mem_password" class="form-control input" />
                    <p class="help-block">패스워드는 <?php echo element('password_length', $view); ?> 자리 이상이어야 하며 영문과 숫자를 반드시 포함해야 합니다</p>
                </div>
            </li>
            <li>
                <span>패스워드<br>확 인</span>
                <div class="form-text text-primary group"><input type="password" id="mem_password_re" name="mem_password_re" class="form-control input" /></div>
            </li>
            <li>
                <span>이메일</span>
                <div class="form-text text-primary group"><input type="email" id="mem_email" name="mem_email" class="form-control input" />
                <?php if ($this->cbconfig->item('use_register_email_auth')) { ?>
                    <p class="help-block">이메일 인증을 받으신 후에 아이디/패스워드로 로그인이 가능합니다</p>
                <?php } ?>
                </div>
            </li>
            <li>
                <span>닉네임</span>
                <div class="form-text text-primary group">
                    <input type="text" id="mem_nickname" name="mem_nickname" class="form-control input" value="<?php echo html_escape($this->member->item('mem_nickname'));?>" />
                    <p class="help-block">공백없이 한글, 영문, 숫자만 입력 가능 2글자 이상
                    <?php if ($this->cbconfig->item('change_nickname_date')) { ?>
                        <br />지금 적용되는 닉네임은 앞으로 <?php echo $this->cbconfig->item('change_nickname_date'); ?>일 이내에는 변경할 수 없습니다
                    <?php } ?>
                    </p>
                </div>
            </li>
            
        </ol>
        <button type="submit">수 정 하 기</button>
    </section>
    
    <?php echo form_close(); ?>
</div>

<?php
    $this->managelayout->add_js(base_url('assets/js/member_register.js'));
?>

<script type="text/javascript">
//<![CDATA[
$(function() {
    $('#fdefaultinfoform').validate({
        rules: {
            mem_userid: {required :true, minlength:3, maxlength:20, is_userid_available:true},
            mem_password: {required :true, minlength:<?php echo element('password_length', $view); ?>, is_password_available:true},
            mem_password_re : {required: true, minlength:<?php echo element('password_length', $view); ?>, equalTo : '#mem_password' },
            mem_email: {required :true, email:true, is_email_available:true},
            mem_nickname: {required :true, is_nickname_available:true}
        }
    });
});
//]]>
</script>
