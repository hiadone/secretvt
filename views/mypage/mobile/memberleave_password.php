<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<div class="mt20 mypage">

    <section class="title02">
        <h2>회원탈퇴 하기</h2>
        <p><span>회원탈퇴</span>를 하실 수 있습니다.</p>
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
    
    
    <div class="form-horizontal mt3per">
        <?php
        $attributes = array('class' => 'form-horizontal', 'name' => 'fconfirmpassword', 'id' => 'fconfirmpassword', 'onsubmit' => 'return confirmleave()');
        echo form_open(current_url(), $attributes);
        ?>  
    <section class="info_logout">
        <figure>
           <img src="<?php echo base_url('/assets/images/temp/info_img/info_stop.png') ?>" alt="stop">
           
           <figcaption>
               <h2>정말 탈퇴 하시겠습니까?</h2>
               <p>
                    회원 탈퇴 시 모든 정보가 삭제되며,<br/>
                    어떠한 경우에도 복구되지 않습니다.<br/>
                    <br/>
                    탈퇴 시 동일한 아이디, 이메일의 재가입은<br/> 
                    1개월 이내로는 불가능하며<br/>
                    사용하신 모든 내역정보가 소멸됩니다.
                    <br/>
                    그래도 탈퇴 하시겠습니까?
               </p>
           </figcaption>
        </figure>

        <?php
        echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>');
        echo show_alert_message(element('message', $view), '<div class="alert alert-auto-close alert-dismissible alert-warning"><button type="button" class="close alertclose" >&times;</button>', '</div>');
        ?>
        <?php if($this->member->item('mem_password')){ ?>
        <div class="logout_pw">
            <label>비밀번호</label>
            <input type="password" id="mem_password" name="mem_password"/>
            <button type="submit">확 인</button>
        </div>
        
        <?php }else{?>
        <input type="hidden" id="mem_password" name="mem_password" value="<?php echo random_string('alnum', 10) ?>">
        <div class="logout_pw">
            
            <div class="alert alert-dismissible alert-info">
                    회원님은 소셜 계정을 통하여 로그인하셨습니다. <br />
                    소셜 계정은 별도의 비밀번호 입력 없이 바로 탈퇴가 가능합니다.
                </div>
            <button type="submit">확 인</button>
        </div>

        <?php } ?>
        <?php echo form_close(); ?>
    </section>  
    

    
  <section class="ad" style="margin-bottom:0;">
        <h4>ad</h4>
        <?php echo banner("mypage_banner_1") ?>
    </section>
    </div>

</div>

<script type="text/javascript">
//<![CDATA[

function confirmleave() {
    if (confirm('정말 회원 탈퇴를 하시겠습니까? 탈퇴한 회원정보는 복구할 수 없으므로 신중히 선택하여주세요. 확인을 누르시면 탈퇴가 완료됩니다 ')) {
        return true;
    } else {
        return false;
    }
}
//]]>
</script>
