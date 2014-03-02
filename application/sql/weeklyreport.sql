select 
fb_users.uid,fb_users.email,fb_users.fullname, 
IFNULL(count0,0) as count0, IFNULL(count1,0) as count1, IFNULL(count2,0) as count2 ,IFNULL(count3,0) as count3, IFNULL(count4,0) as count4,IFNULL(wordcount,0) as wordcount
from ( 
	SELECT count(*) as wordcount,uid from words 
    where date BETWEEN SYSDATE() - INTERVAL 14 DAY AND SYSDATE()
    group by uid 
    ) wordtable
left join (
	select 
	COUNT(CASE WHEN action=0 THEN 1 END) AS count0,
	COUNT(CASE WHEN action=1 THEN 1 END) AS count1,
	COUNT(CASE WHEN action=2 THEN 1 END) AS count2,
	COUNT(CASE WHEN action=3 THEN 1 END) AS count3,
	COUNT(CASE WHEN action=4 THEN 1 END) AS count4,
	uid
	from events 
	where datetime BETWEEN SYSDATE() - INTERVAL 14 DAY AND SYSDATE()
	group by uid ) eventtable
ON eventtable.uid=wordtable.uid
right  join fb_users
on wordtable.uid=fb_users.uid
