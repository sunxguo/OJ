#include "../include/stdio.h"
#include "../include/stdlib.h"

/*
	stdlib 库
	rand()   获取随机数
	system() 调用cmd命令行命令
 */

int Guess(int right);

int check(void)
{
	int password;

	printf("************************************\n");
	printf("* 该程序需要用户验证，请输入邀请码 *\n");
	printf("************************************\n");

	scanf("%d", &password );

	return password;
}

main()
{
	int right;
	int number;
	int password;
		
	do
	{
	
		password = check();
		
	}while( password != 1234 );
	

	printf("************************************\n");
	printf("*        欢迎来到猜数字游戏：      *\n");
	printf("************************************\n");
	printf("************************************\n");
	printf("*       猜数字游戏1.0版：XXX       *\n");
	printf("************************************\n");
	
	
	do
		right = rand() % 100;
	while( Guess(right) == 'y');

	printf("\n感谢您的参与，再见！\m");
	
	/* 暂停 */
	system("pause");

}


int Guess(int right)
{
	int number;
	char come;
	
	do
	{

		printf("\n请输入一个1至100之间的数：\n");
		scanf("%d", &number);

		if(number > right)
		{
			switch( (number - right)/10 )
			{
				case 0:
					printf("加油，只大了一点点！");
				break;
				case 1:
					printf("数字大了不少。");
				break;
				case 2:
					printf("数字大太多了！");
				break;
				default:
					printf("数字大太多了！");	
			}

		}else if( number < right )
		{
			switch( ( right - number)/10 )
			{
				case 0:
					printf("加油，只小了一点点！");
				break;
				case 1:
					printf("数字小了不少。");
				break;
				case 2:
					printf("数字小太多了！");
				break;
				default:
					printf("数字小太多了！");	
			}
		}
		
	}while (  number != right );
	
	printf("\n恭喜你，猜对了！\n");
	printf("再来一遍吗，少年？(y/n)\n");
	
	/* 避免缓冲区干扰 */
	do
		scanf("%c", &come);
	while(come != 'y' && come != 'n');
	
	
	if( come == 'y' )
	{
		return 'y';
	}else
	{
		return 'n';	
	}
	
}