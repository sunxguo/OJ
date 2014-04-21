#include "../Include/stdio.h"


main()
{
	int right = 60;
	int number;
	int password;

	/*
		如果，这些都难不倒你的话，可以考虑把答案换成随机数。
		或者给程序加个密码，让用户输入特定的密码才能执行。
	*/

	do
	{
		printf("************************************\n");
		printf("* 该程序需要用户验证，请输入邀请码 *\n");
		printf("************************************\n");

		scanf("%d", &password );
	}while( password != 1234 );

	/*
		猜数字游戏：

		定义一个1至100之间的数。让用户输入数字来猜。*/

	printf("************************************\n");
	printf("*        欢迎来到猜数字游戏：      *\n");
	printf("************************************\n");

	printf("************************************\n");
	printf("*       猜数字游戏1.0版：XXX       *\n");
	printf("************************************\n");

	printf("请输入一个1至100之间的数：\n");
	scanf("%d", &number);

	/*
		如果用户输入的数字比答案大：
		大20以上的话，则打印"数字大太多了！"
		大10以上的话，则打印"数字大了不少。"
		大几个数的话，则打印"加油，只大了一点点！"

		比答案小的话同理输出。

		如果等于正确答案则打印"恭喜你，猜对了！" */

	while( number != right )
	{
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

		}else
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
		
		printf("请输入一个1至100之间的数：\n");
		scanf("%d", &number);
	}

	printf("恭喜你，猜对了！");

}

