#include "../include/stdio.h"
#include "../include/stdlib.h"

/*
	stdlib ��
	rand()   ��ȡ�����
	system() ����cmd����������
 */

int Guess(int right);

int check(void)
{
	int password;

	printf("************************************\n");
	printf("* �ó�����Ҫ�û���֤�������������� *\n");
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
	printf("*        ��ӭ������������Ϸ��      *\n");
	printf("************************************\n");
	printf("************************************\n");
	printf("*       ��������Ϸ1.0�棺XXX       *\n");
	printf("************************************\n");
	
	
	do
		right = rand() % 100;
	while( Guess(right) == 'y');

	printf("\n��л���Ĳ��룬�ټ���\m");
	
	/* ��ͣ */
	system("pause");

}


int Guess(int right)
{
	int number;
	char come;
	
	do
	{

		printf("\n������һ��1��100֮�������\n");
		scanf("%d", &number);

		if(number > right)
		{
			switch( (number - right)/10 )
			{
				case 0:
					printf("���ͣ�ֻ����һ��㣡");
				break;
				case 1:
					printf("���ִ��˲��١�");
				break;
				case 2:
					printf("���ִ�̫���ˣ�");
				break;
				default:
					printf("���ִ�̫���ˣ�");	
			}

		}else if( number < right )
		{
			switch( ( right - number)/10 )
			{
				case 0:
					printf("���ͣ�ֻС��һ��㣡");
				break;
				case 1:
					printf("����С�˲��١�");
				break;
				case 2:
					printf("����С̫���ˣ�");
				break;
				default:
					printf("����С̫���ˣ�");	
			}
		}
		
	}while (  number != right );
	
	printf("\n��ϲ�㣬�¶��ˣ�\n");
	printf("����һ�������ꣿ(y/n)\n");
	
	/* ���⻺�������� */
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