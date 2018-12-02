use woodpecker;

start transaction;
insert into users (name, username, email) values ('Gyula', 'avardeth', 'g@gmail.com');
insert into login values ( (select id from users where name='avardeth'), 'avardeth', '$2y$10$ErnDO6Cr6EFpS7AEylO0k.gCgM/SY2iWdJZ1VveZlIu.K5U5k8XEy', now());
commit;