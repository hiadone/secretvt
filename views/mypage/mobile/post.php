<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>
<div class="main_flex">
    <div class="mt20 mypage">
        <section class="title02">
            <h2>작성글</h2>
        </section>
        
        <section class="myinfo">
            <figure class="info_area">
                <img src="<?php echo base_url('assets/images/temp/info_img/info_user.png') ?>" alt="user">
                <figcaption>
                    <h2>
                        <?php echo html_escape($this->member->item('mem_userid')); ?>
                    </h2>
                    <p><strong>"<?php echo html_escape($this->member->item('mem_nickname')); ?>" </strong>님 안녕하세요</p>
                </figcaption>
            </figure>
        </section>

        <section class="info_table">
            <table>
                <tr>
                    <td>
                        <a href="<?php echo site_url('mypage'); ?>">내 정보</a>
                    </td>
                    <td class="active">
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


        <!-- <section class="title02">
            <h2>나의 작성글</h2>
            <p><span>나의 작성글</span>를 확인 하실 수 있습니다.</p>
        </section> -->

        <!-- <ul class="table-top mb10">
            <li><a href="<?php echo site_url('mypage/post'); ?>" class="btn btn-warning btn-sm" title="원글">원글</a></li>
            <li><a href="<?php echo site_url('mypage/comment'); ?>" class="btn btn-success btn-sm" title="댓글">댓글</a></li>
        </ul> -->
        <section class="table_02">
            <table>
                <thead>
                    <tr>
                        <th>번호</th>
                        <!-- <th>이미지</th> -->
                        <th>제목</th>
                        <th>날짜</th>
                        <th>댓글</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if (element('list', element('data', $view))) {
                    foreach (element('list', element('data', $view)) as $result) {
                ?>
                    <tr>
                        <td><?php echo element('num', $result); ?></td>
                        <!-- <td style="padding:0px"><?php if (element('thumb_url', $result)) { ?><img class="media-object" src="<?php echo element('thumb_url', $result); ?>" alt="<?php echo html_escape(element('post_title', $result)); ?>" title="<?php echo html_escape(element('post_title', $result)); ?>" style="width:50px;height:40px;" /><?php } ?></td> -->
                        <td style="word-break:break-all;width:60%;text-align: left;padding-left:10px;"><a href="<?php echo element('post_url', $result); ?>" target="new" title="<?php echo html_escape(element('post_title', $result)); ?>"><?php echo html_escape(element('post_title', $result)); ?></a>
            
                        </td>
                        <td><?php echo display_datetime(element('post_datetime', $result)); ?></td>
                        <td><?php if (element('post_comment_count', $result)) { ?><span class="label label-success"><?php echo element('post_comment_count', $result); ?> </span><?php } ?>
            <?php if (element('post_like', $result)) { ?><span class="label label-info">+ <?php echo element('post_like', $result); ?></span><?php } ?>
            <?php if (element('post_dislike', $result)) { ?><span class="label label-danger">- <?php echo element('post_dislike', $result); ?></span><?php } ?>
                        </td>
                    </tr>
                <?php
                    }
                }
                if ( ! element('list', element('data', $view))) {
                ?>
                    <tr>
                        <td colspan="4" class="nopost">회원님이 작성하신 글이 없습니다</td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        
        <nav><?php echo element('paging', $view); ?></nav>
        </section>
       

        
    </div>
</div>
<script type="text/javascript">

$( "#dialog" ).dialog({
  autoOpen: false,
  modal : true,
  
  show: {
    effect: "fade",
    duration: 200
  },
  hide: {
    effect: "fade",
    duration: 300
  },
  open: function() { jQuery('div.ui-widget-overlay').bind('click', function() { jQuery('#dialog').dialog('close'); }) }
});

$( "#opener" ).on( "click", function() {
  $( "#dialog" ).dialog( "open" );
});
$( "#dialog" ).on( "click", function() {
  $( "#dialog" ).dialog( "close" );
});

</script>