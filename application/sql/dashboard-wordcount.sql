select
count(word) as total,
count( case when date=curdate() then 1 end ) as today,
count( case when date BETWEEN SYSDATE() - INTERVAL 7 DAY AND SYSDATE() then 1 end) as week,
count(case when starred=1 then 1 end) as starred
from words
where uid=