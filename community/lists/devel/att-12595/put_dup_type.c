#include <stdint.h>
#include <stdio.h>
#include <mpi.h>

#define PRINT_ARGS

#ifdef PRINT_ARGS
/* defined in ompi/datatype/ompi_datatype_args.c */
extern int32_t ompi_datatype_print_args(const struct ompi_datatype_t *pData);
#endif

int main(int argc, char *argv[])
{
    MPI_Win win;
    MPI_Datatype dt1, dt2;
    int obuf[1], tbuf[1];

    obuf[0] = 77;
    tbuf[0] = 88;

    MPI_Init(&argc, &argv);

    MPI_Type_contiguous(1, MPI_INT, &dt1);
    MPI_Type_dup(dt1, &dt2);
    MPI_Type_commit(&dt2);

#ifdef PRINT_ARGS
    printf("#### dt1 (%p) ####\n", (void *)dt1);
    ompi_datatype_print_args(dt1);
    printf("#### dt2 (%p) ####\n", (void *)dt2);
    ompi_datatype_print_args(dt2);
    fflush(stdout);
#endif

    MPI_Win_create(tbuf, sizeof(int), 1, MPI_INFO_NULL, MPI_COMM_SELF, &win);
    MPI_Win_fence(0, win);
    MPI_Put(obuf, 1, MPI_INT, 0, 0, 1, dt2, win);
    MPI_Win_fence(0, win);

    MPI_Type_free(&dt1);
    MPI_Type_free(&dt2);
    MPI_Win_free(&win);
    MPI_Finalize();

    if (tbuf[0] == 77) {
        printf("OK\n");
    } else {
        printf("NG\n");
    }
    fflush(stdout);

    return 0;
}

