<div>#<?php echo $current_userdata['id'] . ' [+] ' .$current_userdata['username'];  ?></div>
<div><?php echo strtoupper(user_role($current_userdata['role'])); ?></div>
<div><?php echo $current_userdata['email']; ?></div>
