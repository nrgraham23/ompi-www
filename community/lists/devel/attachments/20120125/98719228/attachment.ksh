Index: ompi/errhandler/errcode-internal.c
===================================================================
--- ompi/errhandler/errcode-internal.c	(revision 25448)
+++ ompi/errhandler/errcode-internal.c	(working copy)
@@ -95,7 +95,7 @@
     ompi_err_temp_out_of_resource.code = OMPI_ERR_TEMP_OUT_OF_RESOURCE;
     ompi_err_temp_out_of_resource.mpi_code = MPI_ERR_INTERN;
     ompi_err_temp_out_of_resource.index = pos++;
-    strncpy(ompi_err_temp_out_of_resource.errstring, "MPI_ERR_TEMP_OUT_OF_RESOURCE", OMPI_MAX_ERROR_STRING);
+    strncpy(ompi_err_temp_out_of_resource.errstring, "OMPI_ERR_TEMP_OUT_OF_RESOURCE", OMPI_MAX_ERROR_STRING);
     opal_pointer_array_set_item(&ompi_errcodes_intern, ompi_err_temp_out_of_resource.index, 
                                 &ompi_err_temp_out_of_resource);
 