# -*- coding: utf-8 -*-
from __future__ import unicode_literals

import MySQLdb
class Busqueda(object):
	"""docstring for ClassName"""
def comparacion(arg):
        db = MySQLdb.connect(host="localhost", user="root", passwd="250901", db="acceso")

        #create a cursor for the select
        a = False

        cur = db.cursor()

	#execute an sql query
        cur.execute("SELECT * FROM acceso.residentes")

	##Iterate 
        for row in cur.fetchall() :
	      #data from rows
	      #print
                if (row[0]==arg):
                        if  row[1]==1:
                                a=True
                                break


	# close the cursor
        cur.close()

	# close the connection
        db.close ()

        return a
