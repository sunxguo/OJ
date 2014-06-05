#include <stdio.h>
#include <string.h>
#include <unistd.h>
#include <signal.h>
#include "mysql.h"
#define LENGTH 100
#define FILE_PATH "/var/www/kernel/main.c"

char query[LENGTH];
int query_db(){
	MYSQL mysql;
	mysql_init(&mysql);
	mysql_real_connect(&mysql,"localhost","root","1024","oj",0,NULL,0);
	int flag=mysql_real_query(&mysql,query,(unsigned int) strlen(query));
        if(flag){
                printf("[%s] query failed! \n",query);
                return 0;
        }else{
		printf("[%s] made ... \n",query);
		return 1;
	}
}
void update_compile_db(int status,int id){
	char sstatus[10],sid[10];
	sprintf(sid,"%d",id);
	sprintf(sstatus,"%d",status);
//	strcpy(query,strcat(strcat(strcat("update code set c_status=",sstatus)," where c_ID="),sid));
//	query=strcat(strcat(strcat(strcat(strcat(strcat("update ",table),"set c_code="),val),"where "),dcol),dval);
	strcpy(query,"update code set c_status=");
	strcat(query,sstatus);
	strcat(query," where c_ID=");
	strcat(query,sid);
	query_db();
}
void create_code_file(char code[LENGTH]){
	FILE *fd;
	char str[LENGTH];
	fd = fopen(FILE_PATH, "w+"); 
	/* 创建并打开文件 */
	if (fd){
		fputs(code, fd); 
		/* 写入代码 */
		fclose(fd);
	}
}
int compile(){
//	execl("/bin/sh","sh","-c",compile_command,NULL);
	FILE *fp;
	char buffer[80];
	fp=popen("gcc -o /var/www/kernel/main /var/www/kernel/main.c","r");
	fgets(buffer,sizeof(buffer),fp);
	printf("%s","this is oj...start\n");
	printf("%s",buffer);
	printf("%s","this is oj...end\n");
	pclose(fp);
	if(buffer) return 1;
	else return 0;
}
void execute(){
//	return true;	
}
int handler(){
	MYSQL mysql;
	MYSQL_RES *res;
	MYSQL_ROW row;
	char *query;
	int flag,t;
	mysql_init(&mysql);
	if(!mysql_real_connect(&mysql,"localhost","root","1024","oj",0,NULL,0)){
		printf("Failed to connect to MySQL! \n");
//		printf("\tError at mysql_real_connect:%s\n", mysql_error(&mysql)); 
		return 0;
	}else printf("Connected MySQL successfully! \n");
	query="select * from code where `c_status`=0";
	flag=mysql_real_query(&mysql,query,(unsigned int) strlen(query));
	if(flag){
		printf("query failed! \n");
		return 0;
	}else printf("[%s] made ... \n",query);
	res=mysql_store_result(&mysql);
//	while(row=mysql_fetch_row(res)){
	//	for(t=0;t<mysql_num_fields(res);t++){
//			printf("%s",row[0]);	
	//	}
//		printf("\n");
//	}
	row=mysql_fetch_row(res);
	create_code_file(row[3]);
	if(compile()==0) printf("compile error! \n");
	else printf("compile right! \n");
	update_compile_db(1,atol(row[0]));
	mysql_close(&mysql);
	return 0;
}
int main(void){
	while(1){
		handler();
		sleep(5);
	}
}
